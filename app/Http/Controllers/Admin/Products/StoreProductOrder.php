<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\Product;
use App\Models\Smsir;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\CurrencyHistory;
use App\Models\DepotItem;
use App\Models\Depot;

class StoreProductOrder extends BaseComponent
{
    use AuthorizesRequests;

    public $notes, $sendNote, $noteType, $sms, $sendSms , $payment;
    public $orderStatus, $orderSms;
	public $allow = false , $user_in_order;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
//            $this->create();
            abort(404);
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }
    }

    public function updatedOrderStatus()
    {
        $this->orderSms = \App\Http\Controllers\Smsir\Facades\Smsir::getUserText($this->model->order, $this->model, $this->orderStatus);
    }

    public function render()
    {
        return view('admin.products.store-product-order')
            ->extends('admin.layouts.admin');
    }

    public function edit($id)
    {
        $this->authorize('product_manager');

        $this->setMode(self::MODE_UPDATE);
        $this->model = OrderDetail::with('order')->findOrFail($id);
				$online_time = date("Y-m-d H:i:s");
		$user_online = $this->model->user_online;
		$last_online_time = $this->model->online_time;

		if (!empty($user_online)) {
			if ($user_online == auth()->user()->id)
			{
				$this->model->online_time = $online_time;
			} else {
				
				$origin = date_create($last_online_time);
				$target = date_create($online_time);
				$interval = date_diff($origin, $target);
				$m = $interval->format('%i');
				
				if ($m < 2){
					$this->allow = true;
					
					$this->user_in_order = User::where('id',$user_online)->first()->name;
					
				} else {
					$this->model->online_time = $online_time;
					$this->model->user_online = auth()->user()->id;
				}
			}
		} else {
			$this->model->online_time = $online_time;
			$this->model->user_online = auth()->user()->id;
		}

		$this->model->save();
        $product = $this->model->product;
        if (!str_contains(($product->manager_mobile ?? ''), auth()->user()->mobile)){
            abort(403);
        }

        $this->orderStatus = $this->model->status;
        $order = $this->model->order;

		
        $this->notes = $order->notes;
        $this->sms = $order->sms;
    }

    public function update()
    {
        $this->authorize('product_manager');

        $this->saveInDatabase($this->model);

        $this->reset('orderSms');
        $this->emitNotify('سفارش با موفقیت ویرایش شد');
    }

    private function saveInDatabase(OrderDetail $orderDetail)
    {
        $this->validate(
            [
                'orderStatus' => ['required']
            ],
            [],
            [
                'orderStatus' => 'وضعیت سفارش'
            ]
        );
        $status = $orderDetail->status;
        $orderDetail->status = $this->orderStatus;
        $orderDetail->save();


        if ($status != $this->orderStatus) {
            \App\Http\Controllers\Smsir\Facades\Smsir::replaceAdminAndSend($orderDetail->order, $orderDetail, $this->orderStatus);
            \App\Http\Controllers\Smsir\Facades\Smsir::replaceManagerAndSend($orderDetail->order, $orderDetail, $this->orderStatus);


			if ($orderDetail->product->type == Product::TYPE_INSTANT_DELIVERY && $this->orderStatus == Order::STATUS_COMPLETED)
			{
				$check = DepotItem::where('product_id',$detail->product->id)->first();
				$price = 0;
				$eneter = Depot::latest('id')->where('action',Depot::ENTER)->whereHas('depotItem',function($q) use ($orderDetail){
					return $q->where('product_id',$orderDetail->product->id);
				})->select('price','count')->get();
				$exit_count = Depot::latest('id')->where('action',Depot::EXIT)->whereHas('depotItem',function($q) use ($orderDetail){
					return $q->where('product_id',$orderDetail->product->id);
				})->sum('count');

				$eneter_count = (int)$eneter->sum('count');
				$diff = $eneter_count - (int)$exit_count;
					

				foreach($eneter as $item) {
					if ($eneter_count - (int)$item->count < $diff) {
						$price = $item->price;
						break;
					} else {
						$eneter_count = $eneter_count - (int)$item->count;
					}
				}
				if (is_null($check)){
					$check = DepotItem::create([
						'product_id' => $orderDetail->product->id,
						'category' => $orderDetail->product->category_id,
						'status' => $orderDetail->product->status,
						'image' => $orderDetail->product->image ?? '',
						'type' => Depot::DIGITAL
					]);
					Depot::create([
						'depot_items_id' => $check->id,
						'count' => $orderDetail->quantity,
						'action' => Depot::EXIT,
						'user_id' => auth()->id(),
						'price' => $price ,
						'category' => $orderDetail->product->category_id ,
						'exit_price' => $orderDetail->product->price,
						'description' => 'ثبت سفارش',
						'image' => $orderDetail->product->image ?? '',
						'track_id' => (int)$orderDetail->order->id + Order::CHANGE_ID,
						'order_detail_id' => $orderDetail->id,
						'type' => Depot::DIGITAL,
						'licenses' => $this->orderSms
					]);
				} else {
					$check_depot = Depot::where('order_detail_id',$orderDetail->quantity->id)->whereNull('licenses')->first();
					if (is_null($check_depot)){
						Depot::create([
							'depot_items_id' => $check->id,
							'count' => $orderDetail->quantity,
							'action' => Depot::EXIT,
							'user_id' => auth()->id(),
							'price' => $price ,
							'category' => $orderDetail->product->category_id ,
							'exit_price' => $orderDetail->product->price,
							'description' => 'ثبت سفارش',
							'image' => $orderDetail->product->image ?? '',
							'track_id' => (int)$orderDetail->order->id + Order::CHANGE_ID,
							'order_detail_id' => $orderDetail->id,
							'type' => Depot::DIGITAL,
							'licenses' => $this->orderSms
						]);
					}
				}
			}

			if ($orderDetail->product->type == Product::TYPE_INSTANT_DELIVERY || $orderDetail->product->type == Product::TYPE_NORMAL_DELIVERY) {
				if ($orderDetail->product->buy_amount > 0 && !is_null($orderDetail->product->currency_id))
				{
					if ($this->orderStatus == Order::STATUS_COMPLETED)
					{
						CurrencyHistory::create([
							'currency_id' => $orderDetail->product->currency_id,
							'count' => -1*($orderDetail->product->buy_amount * $orderDetail->quantity),
							'user_id' => auth()->id(),
							'amount' => $orderDetail->product->currency->amount,
							'order_id' => $orderDetail->id,
							'product' => $orderDetail->product->title,
							'description' => ' تکمیل سفارش'.' کد سفارش : '.$orderDetail->order->id,
						]);
					} elseif ($status == Order::STATUS_COMPLETED)
					{
						$row = CurrencyHistory::where('order_id',$orderDetail->id)->first();
						if (!is_null($row))
						{
							$row->delete();
						}
					}
				}
			}

            if (!is_null($this->orderSms) && $this->orderSms != ''){
                // \App\Http\Controllers\Smsir\Facades\Smsir::send($this->orderSms, $this->model->order->mobile);

                $sms = Smsir::create([
                    'model_type' => 'order',
                    'model_id' => $this->model->order_id,
                    'mobile' => $this->model->order->mobile,
                    'message' => $this->orderSms,
                ]);

                $note = OrderNote::create([
                    'note' => $this->orderSms,
                    'is_user_note' => 1,
                    'is_read' => 0,
                    'order_id' => $this->model->order_id,
                    'user_id' => auth()->id(),
                ]);

                $this->sms->push($sms);
                $this->notes->push($note);
            }
        }
    }

    public function resetInputs()
    {
        //set field
    }

	public function updateTime()
	{
		$online_time = date("Y-m-d H:i:s");
		$user_online = $this->model->user_online;
		if ($user_online == auth()->user()->id)
			{
				$this->model->online_time = $online_time;
				$this->model->save();
			}
	}

    public function sendNote()
    {
        $this->validate(
            [
                'sendNote' => ['required', 'string', 'max:6500'],
                // 'noteType' => ['required', 'boolean'],
            ],
            [],
            [
                'sendNote' => 'یادداشت',
                // 'noteType' => 'نوع یادداشت',
            ]
        );

        $note = OrderNote::create([
            'note' => $this->sendNote,
            'is_user_note' => 0,
            'is_read' => 0,
            'order_id' => $this->model->order_id,
            'user_id' => auth()->id(),
        ]);

        $this->notes->push($note);

        $this->reset(['sendNote']);
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

        \App\Http\Controllers\Smsir\Facades\Smsir::send($this->sendSms, $this->model->order->mobile);

        $sms = Smsir::create([
            'model_type' => 'order',
            'model_id' => $this->model->order_id,
            'mobile' => $this->model->order->mobile,
            'message' => $this->sendSms,
        ]);

        $note = OrderNote::create([
            'note' => $this->sendSms,
            'is_user_note' => 1,
            'is_read' => 0,
            'order_id' => $this->model->order_id,
            'user_id' => auth()->id(),
        ]);

        $this->sms->push($sms);
        $this->notes->push($note);

        $this->reset(['sendNote', 'noteType']);
        $this->emitNotify('پیامک با موفقیت ثبت شد');
    }
}