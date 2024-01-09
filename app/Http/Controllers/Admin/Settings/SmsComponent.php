<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SmsComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $sms;

    public function mount()
    {
        $this->mode = self::MODE_UPDATE;

        Setting::whereIn('name', $this->getSmsNames())->get()->each(function ($item) {
            $this->sms[$item->name] = $item->value;
        });
    }

    public function render()
    {
        $this->authorize('show_settings');

        return view('admin.settings.sms-component')
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'sms' => ['required', 'array'],
            'sms.*' => ['nullable', 'string', 'max:6500'],
        ];
    }

    public function update()
    {
        $this->authorize('edit_settings');

        $this->validate();

        $this->saveInDatabase();

        $this->emitNotify('پیامک با موفقیت ویرایش شد');
    }

    private function saveInDatabase()
    {
        foreach ($this->getSmsNames() as $item) {
            $setting = Setting::where('name', $item)->first();
            if (is_null($setting)) {
                Setting::create([
                    'name' => $item,
                    'value' => $this->sms[$item] ?? '',
                ]);
            } elseif ($setting->value != $this->sms[$item] ?? '') {
                $setting->value = $this->sms[$item] ?? '';
                $setting->save();
            }
        }
    }

    protected function getSmsNames()
    {
        return [
            'admin_numbers',
            'admin_wc-pending', 'admin_wc-on-hold', 'admin_wc-processing',
            'admin_wc-custom-status', 'admin_wc-failed', 'admin_wc-post',
            'admin_wc-cancelled', 'admin_wc-refunded', 'admin_wc-completed',

            'manager_wc-pending', 'manager_wc-on-hold', 'manager_wc-processing',
            'manager_wc-custom-status', 'manager_wc-failed', 'manager_wc-post',
            'manager_wc-cancelled', 'manager_wc-refunded', 'manager_wc-completed',

            'user_wc-pending', 'user_wc-on-hold', 'user_wc-processing',
            'user_wc-custom-status', 'user_wc-failed', 'user_wc-post',
            'user_wc-cancelled', 'user_wc-refunded', 'user_wc-completed','user_wc-breacked','user_ticket',
			'user_reject_auth','user_ok_auth'
        ];
    }

    protected function resetInputs()
    {
        $this->reset();
    }
}