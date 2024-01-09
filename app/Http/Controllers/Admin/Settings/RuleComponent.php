<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RuleComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $rule;

    public function render()
    {
        $this->authorize('show_settings');

        $rules = Setting::where('name', 'rules')->get();

        return view('admin.settings.rule-component', ['rules' => $rules])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'rule' => ['required', 'string', 'max:6500'],
        ];
    }

    public function create()
    {
        $this->authorize('create_settings');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_settings');

        $this->validate();

        $this->saveInDatabase(new Setting());

        $this->setMode(self::MODE_NONE);
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

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('قانون با موفقیت ویرایش شد');
    }

    public function saveInDatabase(Setting $setting)
    {
        $setting->name = 'rules';
        $setting->value = $this->rule;
        $setting->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_settings');

        Setting::findOrFail($id)->delete();

        $this->emitNotify('قانون با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['rule']);
    }
}