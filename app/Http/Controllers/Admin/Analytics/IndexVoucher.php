<?php

namespace App\Http\Controllers\Admin\Analytics;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Voucher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexVoucher extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_analytics');

        $vouchers = Voucher::latest()
            ->with(['orders', 'orders.details'])
            ->paginate($this->perPage);

        return view('admin.analytics.index-voucher', ['vouchers' => $vouchers])
            ->extends('admin.layouts.admin');
    }
}