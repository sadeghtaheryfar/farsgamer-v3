<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexProductOrder extends BaseComponent
{
    use AuthorizesRequests;

    public $statusCount , $search;

    public $status , $product_name;
    protected $queryString = ['status','search','product_name'];

    public function render()
    {
        $this->authorize('product_manager');
		


		

        $products = Product::latest()
            ->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%')
            ->get()->pluck('id');
		
		$orderDetails = OrderDetail::with(['order', 'product'])->latest('id')
            ->whereIn('product_id', $products)->when($this->search, function ($query) {
                return $query->where('order_id', (int)$this->search - Order::CHANGE_ID);
            })
            ->when($this->status, function ($query) {
                if ($this->status == 'wc-processing')
					return $query->where('status', $this->status)->orWhere('status',Order::STATUS_SPEED_PLUS)->orWhere('status',Order::STATUS_DELAY);
					
                return $query->where('status', $this->status);
            });	

		$manager_start_date = '';
		if (!is_null(auth()->user()->manager_start_date)){
			$manager_start_date = Carbon::make(auth()->user()->manager_start_date)->format('Y-m-d');
			$orderDetails = $orderDetails->whereHas('order',function($q) use ($manager_start_date) {
				return $q->whereBetween('created_at',[$manager_start_date.' 00:00:00' , Carbon::make(now())->format('Y-m-d H:i:s')]);
			});
		} 

        
        $orderDetails = $orderDetails->paginate($this->perPage);

        $this->statusCount['wc-pending'] = $this->getCount($products,'wc-pending');
        $this->statusCount['wc-on-hold'] = $this->getCount($products,'wc-on-hold');
        $this->statusCount['speed_plus'] = $this->getCount($products,'speed_plus');
        $this->statusCount['delay'] = $this->getCount($products,'delay');
        $this->statusCount['wc-processing'] = $this->getCount($products,'wc-processing');
        $this->statusCount['wc-custom-status'] = $this->getCount($products,'wc-custom-status');
        $this->statusCount['wc-failed'] = $this->getCount($products,'wc-failed');
        $this->statusCount['wc-post'] = $this->getCount($products,'wc-post');
        $this->statusCount['wc-cancelled'] = $this->getCount($products,'wc-cancelled');
        $this->statusCount['wc-refunded'] = $this->getCount($products,'wc-refunded');
        $this->statusCount['wc-completed'] = $this->getCount($products,'wc-completed');
		$this->statusCount['wc-breacked'] = $this->getCount($products,'wc-breacked');

        return view('admin.products.index-product-order', ['orderDetails' => $orderDetails])
            ->extends('admin.layouts.admin');
    }

    private function getCount($products, $status)
    {
		$manager_start_date = '';
		if (!is_null(auth()->user()->manager_start_date)){
			$manager_start_date = Carbon::make(auth()->user()->manager_start_date)->format('Y-m-d');
			
		
		}
        return OrderDetail::whereIn('product_id', $products)->whereHas('order',function($q) use ($manager_start_date) {
				return $q->whereBetween('created_at',[$manager_start_date.' 00:00:00' , Carbon::make(now())->format('Y-m-d H:i:s')]);
			})->where('status', $status)->count();
    }
}