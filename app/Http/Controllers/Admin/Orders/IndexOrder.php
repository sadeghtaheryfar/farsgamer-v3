<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderDetail;
use App\Models\PaymentTransaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Product;
use App\Models\CurrencyHistory;
use App\Models\DepotItem;
use App\Models\Depot;

class IndexOrder extends BaseComponent
{
    use AuthorizesRequests;

    public $statusCount;

    public $category, $status , $product_name;
    public $filterTrackingCode, $filterUserMobile,$filterGateWayCode;
    protected $queryString = ['category', 'status', 'filterTrackingCode', 'filterUserMobile','product_name'];



	public function mount()
	{
		
		$pending_orders = OrderDetail::where('status','wc-pending')->orderBy('id','desc')->cursor();
		$this->data = Category::all()->pluck('title','id')->toArray();

		// $breacked_orders = OrderDetail::where('status','wc-breacked')->orderBy('id','desc')->get();

		foreach ($pending_orders as $item) {
			$order_time = $item->order->created_at->toArray();
			$origin = date_create($order_time['year'].'-'.$order_time['month'].'-'.$order_time['day'].' '.$order_time['hour'].':'.$order_time['minute'].':'.$order_time['second']);
			$target = date_create(date('Y-m-d H:i:s'));
			$interval = date_diff($origin, $target);
			$m = $interval->format('%i');
			if ((int)$m > 1) {
				OrderDetail::where('id', $item->id)->update(['status' => "wc-breacked"]);
				$orderSms = \App\Http\Controllers\Smsir\Facades\Smsir::getUserText($item->order,$item, "wc-breacked");
				if (!empty($orderSms)) {
					\App\Http\Controllers\Smsir\Facades\Smsir::send($orderSms, $item->order->mobile);
				}
			}
		}
	}

    public function render()
    {
		
        $this->authorize('show_orders');
		
        $orders = OrderDetail::with(['order.notes'])->latest('id')
            ->when($this->category, function ($query) {
                return $query->whereHas('product', function ($query) {
                    return $query->whereHas('category', function ($query) {
                        return $query->where('parent_id', $this->category);
                    });
                });
            })
            ->when($this->filterTrackingCode, function ($query) {
                return $query->where('order_id', (int)$this->filterTrackingCode - Order::CHANGE_ID)->orWhereHas('product', function ($query) {
                    return $query->where('title','like','%'.$this->filterTrackingCode.'%');
                });
            })
            ->when($this->filterUserMobile, function ($query) {
                return $query->whereHas('order', function ($query) {
                    return $query->where('mobile', $this->filterUserMobile);
                });
            })
			->when($this->product_name, function ($query) {
                return $query->whereHas('product', function ($query) {
                    return $query->where('slug', $this->product_name);
                });
            })
			->when($this->filterGateWayCode, function ($query){
				return $query->whereHas('order',function($query){
					return $query->whereHas('payment',function($query){
						return $query->where('payment_ref',$this->filterGateWayCode);
					});
				});
			})
            ->when($this->status, function ($query) {
				if ($this->status == 'wc-processing')
					return $query->where(function($q){
						return $q->where('status', $this->status)->orWhere('status',Order::STATUS_SPEED_PLUS)->orWhere('status',Order::STATUS_DELAY);
					});
					
                return $query->where('status', $this->status);
            })->has('product')
            ->paginate($this->perPage);
		
        $this->statusCount['wc-pending'] = $this->getCount('wc-pending');
		
        $this->statusCount['wc-on-hold'] = $this->getCount('wc-on-hold');
			
        $this->statusCount['speed_plus'] = $this->getCount('speed_plus');
        $this->statusCount['delay'] = $this->getCount('delay');
        $this->statusCount['wc-processing'] = $this->getCount('wc-processing');
        $this->statusCount['wc-custom-status'] = $this->getCount('wc-custom-status');
        $this->statusCount['wc-failed'] = $this->getCount('wc-failed');
        $this->statusCount['wc-post'] = $this->getCount('wc-post');
        $this->statusCount['wc-cancelled'] = $this->getCount('wc-cancelled');
        $this->statusCount['wc-refunded'] = $this->getCount('wc-refunded');
        $this->statusCount['wc-completed'] = $this->getCount('wc-completed');
		$this->statusCount['wc-breacked'] = $this->getCount('wc-breacked');
		
        return view('admin.orders.index-order', ['orders' => $orders])
            ->extends('admin.layouts.admin');
    }

    public function completeOrder($id)
    {
        $orderDetail = OrderDetail::with('order')->find($id);

        if ($orderDetail->status != Order::STATUS_NOT_PAID &&
            $orderDetail->status != Order::STATUS_COMPLETED) {

			if ($orderDetail->product->type == Product::TYPE_INSTANT_DELIVERY)
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
						'price' => $price,
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
							'price' => $price,
							'category' => $orderDetail->product->category_id ,
							'exit_price' => $orderDetail->product->price,
							'description' => 'ثبت سفارش',
							'image' => $orderDetail->product->image ?? '',
							'track_id' => (int)$orderDetail->order->id + Order::CHANGE_ID,
							'order_detail_id' => $orderDetail->id,
							'type' => Depot::DIGITAL,
							'licenses' => ''
						]);
					}
				}
			}	

            $orderDetail->status = Order::STATUS_COMPLETED;
            $orderDetail->save();
			if ($orderDetail->product->type == Product::TYPE_INSTANT_DELIVERY || $orderDetail->product->type == Product::TYPE_NORMAL_DELIVERY) {
				if ($orderDetail->product->buy_amount > 0 && !is_null($orderDetail->product->currency_id)  )
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
				}
			}

            \App\Http\Controllers\Smsir\Facades\Smsir::replaceUserAndSend($orderDetail->order, $orderDetail, Order::STATUS_COMPLETED, auth()->id());

            $this->emitNotify('سفارش با موفقیت تکمیل شد');
        }
    }

    private function getCount($status)
    {
        return OrderDetail::when($this->category, function ($query) {
            return $query->whereHas('product', function ($query) {
                return $query->whereHas('category', function ($query) {
                    return $query->where('parent_id', $this->category);
                });
            });
        })->where('status', $status)->has('product')->count();
    }
}