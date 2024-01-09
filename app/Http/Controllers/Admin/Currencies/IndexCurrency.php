<?php

namespace App\Http\Controllers\Admin\Currencies;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Currency;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexCurrency extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_currencies');

        $currencies = Currency::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.currencies.index-currency', ['currencies' => $currencies])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_currencies');

        Currency::findOrFail($id)->delete();

        $this->emitNotify('واحد پول با موفقیت حذف شد');
    }
}