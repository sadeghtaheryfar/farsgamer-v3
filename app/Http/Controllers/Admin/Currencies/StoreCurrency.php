<?php

namespace App\Http\Controllers\Admin\Currencies;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Currency;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreCurrency extends BaseComponent
{
    use AuthorizesRequests;

    public $title, $amount;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('admin.currencies.store-currency')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
        $this->authorize('create_currencies');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_currencies');

        $this->saveInDatabase(new Currency());

        $this->emitNotify('واحد پول با موفقیت ثبت شد');
        $this->resetInputs();
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

        $this->saveInDatabase($this->model);

        $this->emitNotify('واحد پول با موفقیت ویرایش شد');
    }

    public function saveInDatabase(Currency $currency)
    {
        $this->validate(
            [
                'title' => ['required','string','max:250'],
                'amount' => ['required','integer','min:0','max:4000000000'],
            ],
            [],
            [
                'title' => 'عنوان',
                'amount' => 'مقدار',
            ]
        );

        $currency->title = $this->title;
        $currency->amount = $this->amount;
        $currency->save();
    }

    public function resetInputs()
    {
        $this->reset(['title', 'amount']);
    }
}