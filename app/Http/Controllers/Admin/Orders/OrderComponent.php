<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\Product;
use App\Models\Smsir;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $categoryCount, $statusCount;
    public $category, $status, $notes, $sendNote, $noteType, $sms, $sendSms;
    public $orderStatus;

    protected $queryString = ['category', 'status'];

    public function render()
    {
        $this->authorize('show_orders');

        $categoryIds = Category::where('parent_id', $this->category)->get()->pluck('id');
        $productIds = Product::whereIn('category_id', $categoryIds)->get()->pluck('id');
        $orderDetailIds = OrderDetail::whereIn('product_id', $productIds)->get()->pluck('order_id');

        $search = $this->search;
        if ((int) $this->search > 0){
            $search = (int) $this->search - Order::CHANGE_ID;
        }

        $orders = Order::latest()
            ->whereIn('id', $orderDetailIds)
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })
            ->search($search)
            ->paginate($this->perPage);

        $this->statusCount['wc-pending'] = $orders->where('status', 'wc-pending')->count();
        $this->statusCount['wc-on-hold'] = $orders->where('status', 'wc-on-hold')->count();
        $this->statusCount['speed_plus'] = $orders->where('status', 'speed_plus')->count();
        $this->statusCount['delay'] = $orders->where('status', 'delay')->count();
        $this->statusCount['wc-processing'] = $orders->where('status', 'wc-processing')->count();
        $this->statusCount['wc-custom-status'] = $orders->where('status', 'wc-custom-status')->count();
        $this->statusCount['wc-failed'] = $orders->where('status', 'wc-failed')->count();
        $this->statusCount['wc-post'] = $orders->where('status', 'wc-post')->count();
        $this->statusCount['wc-cancelled'] = $orders->where('status', 'wc-cancelled')->count();
        $this->statusCount['wc-refunded'] = $orders->where('status', 'wc-refunded')->count();
        $this->statusCount['wc-completed'] = $orders->where('status', 'wc-completed')->count();
		$this->statusCount['wc-breacked'] = $orders->where('status', 'wc-breacked')->count();

        return view('admin.orders.order-component', ['orders' => $orders])
            ->extends('admin.layouts.admin');
    }

    public function rules()
    {
        return [
            'orderStatus' => ['required']
        ];
    }

    public function edit($id)
    {
        $this->authorize('edit_orders');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Order::find($id);
        $this->orderStatus = $this->model->status;

        $this->notes = $this->model->notes;
        $this->sms = $this->model->sms;
    }

    public function update()
    {
        $this->authorize('edit_orders');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('سفارش با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Order $order)
    {
        $status = $order->status;
        $order->status = $this->orderStatus;
        $order->save();

        if ($status != $this->orderStatus) {
            \App\Http\Controllers\Smsir\Facades\Smsir::replaceAdminAndSend($order);
            \App\Http\Controllers\Smsir\Facades\Smsir::replaceManagerAndSend($order);
            \App\Http\Controllers\Smsir\Facades\Smsir::replaceUserAndSend($order);
        }
    }

    public function delete($id)
    {
        $this->authorize('delete_orders');

        Order::findOrFail($id)->delete();

        $this->emitNotify('سفارش با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        //set field
    }

    public function completeLicenses($orderDetail)
    {
        $detail = OrderDetail::find($orderDetail);
        $product = $detail->product;

        if ($product->type == Product::TYPE_INSTANT_DELIVERY && $detail->quantity > sizeof($detail->licenses)) {
            $licensesCode = $product->licenses()->isNotUsed()->take($detail->quantity - sizeof($detail->licenses))->get();
            if (sizeof($licensesCode) == $detail->quantity - sizeof($detail->licenses)) {

                $licenses = $detail->licenses;
                foreach ($licensesCode as $key => $license) {
                    $license->is_used = 1;
                    $license->save();
                    $licenses[] = $license->license;
                }
                $detail->licenses = $licenses;
                $detail->save();

                $this->model = Order::find($detail->order_id);

                $this->emitNotify('لاینسیس با موفقیت ثبت شد');
            } else {
                $this->emitNotify('لاینسیس ها کافی نیست', 'warning');
            }
        }
    }

    public function sendNote()
    {
        $this->validate(
            [
                'sendNote' => ['required', 'string', 'max:6500'],
                'noteType' => ['required', 'boolean'],
            ],
            [],
            [
                'sendNote' => 'یادداشت',
                'noteType' => 'نوع یادداشت',
            ]
        );

        $note = OrderNote::create([
            'note' => $this->sendNote,
            'is_user_note' => $this->noteType,
            'order_id' => $this->model->id,
            'user_id' => auth()->id(),
        ]);

        $this->notes->push($note);

        $this->reset(['sendNote', 'noteType']);
        $this->emitNotify('یادداشت با موفقیت ثبت شد');
    }

    public function deleteNote($key)
    {
        $note = $this->notes->pull($key);
        OrderNote::findOrFail($note->id)->delete();

        $this->emitNotify('یادداشت با موفقیت حذف شد');
    }

    public function sendSms()
    {
        $this->validate(
            [
                'sendSms' => ['required', 'string', 'max:6500'],
            ],
            [],
            [
                'sendSms' => 'پیامک',
            ]
        );

        $sms = \App\Http\Controllers\Smsir\Facades\Smsir::send($this->sendSms, $this->model->mobile);

        $note = Smsir::create([
            'model_type' => 'order',
            'model_id' => $this->model->id,
            'mobile' => $this->model->mobile,
            'message' => $this->sendSms,
            'is_success' => $sms['IsSuccessful'],
            'status' => $sms['Message'],
        ]);

        $this->notes->push($note);

        $this->reset(['sendNote', 'noteType']);
        $this->emitNotify('یادداشت با موفقیت ثبت شد');
    }
}