<?php

namespace App\Http\Controllers\Admin\Vouchers;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Voucher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexVoucher extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_vouchers');

        $vouchers = Voucher::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.vouchers.index-voucher', ['vouchers' => $vouchers])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_vouchers');

        Voucher::findOrFail($id)->delete();

        $this->emitNotify('کد تخفیف با موفقیت حذف شد');
    }
}