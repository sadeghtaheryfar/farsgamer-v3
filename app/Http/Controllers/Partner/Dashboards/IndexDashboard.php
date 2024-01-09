<?php

namespace App\Http\Controllers\Partner\Dashboards;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class IndexDashboard extends BaseComponent
{
    use AuthorizesRequests;

	public $selectedDate = 0 , $manager = true;
	public $message , $label = 'فروش امروز';
	protected $queryString = ['manager','selectedDate'];
    public function render()
    {
       $today_product = [];
	   $onHoldOrders = 0;
	   $refundedOrders = 0;
	   $allPayments = 0;
	   $start = Carbon::now()->subDays($this->selectedDate)->format('Y-m-d');
	   
		$allOrders = OrderDetail::with(['order','product'])->when($this->manager,function($q){
			return $q->whereHas('order',function($q){
				return $q->where('user_id',auth()->id());
			});
		})->latest('id')->where(function($query) use ($start) {
			return $query->where('status',Order::STATUS_HOLD)->orWhere('status',Order::STATUS_REFUNDED)->orWhere('status', Order::STATUS_COMPLETED);
		})->whereHas('order', function($q) use ($start){
			return $q->whereBetween('created_at', [$start.' 00:00:00', Carbon::now()->format('Y-m-d').' 23:59:59']);
		})->cursor();
		
		foreach($allOrders as $item)
		{
			if ($item->status == Order::STATUS_HOLD)
				$onHoldOrders++;
			
			if ($item->status == Order::STATUS_REFUNDED)
				$refundedOrders++;

			if ($item->status == Order::STATUS_COMPLETED){
				$allPayments = $allPayments + $item->price;
			}
		}
		 
		$orderDetails = Product::withCount(['details' => function($q) use ($start){
			 return $q->where('status', Order::STATUS_COMPLETED)->whereHas('order',function($q) use ($start){
				return $q->where('user_id',auth()->id())->whereBetween('created_at', [$start.' 00:00:00', Carbon::now()->format('Y-m-d').' 23:59:59']);
			});
		}])->whereHas('details', function($q) use ($start){
			return $q->where('status', Order::STATUS_COMPLETED)->whereHas('order',function($q) use ($start){
				return $q->where('user_id',auth()->id())->whereBetween('created_at', [$start.' 00:00:00', Carbon::now()->format('Y-m-d').' 23:59:59']);
			});
		})->get()->sortByDesc('details_count');
	
		
        return view('partner.dashboards.index-dashboard' ,
		['most_sold_products' =>$orderDetails,'allOrders' => $allOrders,'allPayments' => $allPayments,'refundedOrders' => $refundedOrders,'onHoldOrders'=> 				$onHoldOrders ]
		)->extends('admin.layouts.admin');
    }
}