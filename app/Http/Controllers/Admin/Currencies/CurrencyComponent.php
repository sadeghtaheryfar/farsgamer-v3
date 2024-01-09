<?php

namespace App\Http\Controllers\Admin\Currencies;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Currency;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CurrencyComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $title;
    public $amount;

    public function render()
    {
        $this->authorize('show_currencies');

        $currencies = Currency::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.currencies.currency-component', ['currencies' => $currencies])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'title' => ['required','string','max:250'],
            'amount' => ['required','integer','min:0','max:4000000000'],
        ];
    }

    public function create()
    {
        $this->authorize('create_currencies');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_currencies');

        $this->validate();

        $this->saveInDatabase(new Currency());

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('واحد پول با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_currencies');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Currency::find($id);

        $this->title = $this->model->title;
        $this->amount = $this->model->amount;
    }

    public function update()
    {
        $this->authorize('edit_currencies');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('واحد پول با موفقیت ویرایش شد');
    }

    public function saveInDatabase(Currency $currency)
    {
        $currency->title = $this->title;
        $currency->amount = $this->amount;
        $currency->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_currencies');

        Currency::findOrFail($id)->delete();

        $this->emitNotify('واحد پول با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['title', 'amount']);
    }
}