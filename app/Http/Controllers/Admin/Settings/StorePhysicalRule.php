<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StorePhysicalRule extends BaseComponent
{
    use AuthorizesRequests;

    public $rule;

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
        return view('admin.settings.store-rule')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
        $this->authorize('create_settings');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_settings');

        $this->saveInDatabase(new Setting());

        $this->emitNotify('قانون با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_settings');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Setting::find($id);

        $this->rule = $this->model->value;
    }

    public function update()
    {
        $this->authorize('edit_settings');

        $this->saveInDatabase($this->model);

        $this->emitNotify('قانون با موفقیت ویرایش شد');
    }

    public function saveInDatabase(Setting $setting)
    {
        $this->validate(
            [
                'rule' => ['required', 'string', 'max:6500'],
            ],
            [],
            [
                'rule' => 'قانون',
            ]

        );

        $setting->name = 'physical_rules';
        $setting->value = $this->rule;
        $setting->save();
    }

    public function resetInputs()
    {
        $this->reset(['rule']);
    }
}