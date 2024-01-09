<?php

namespace App\Http\Controllers\Partner\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentTransaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexOrder extends BaseComponent
{
    use AuthorizesRequests;

    public $statusCount;

    public $category, $status , $product_name;
    public $filterTrackingCode, $filterUserMobile,$filterGateWayCode;


	public function mount()
	{
		
		
	}

    public function render()
    {
		
        $orders = auth()->user()->orderDetails()->with(['order.notes'])->latest('id')->has('product')->paginate($this->perPage);
		
		
        return view('partner.orders.index-order', ['orders' => $orders])->extends('admin.layouts.admin');
    }

}