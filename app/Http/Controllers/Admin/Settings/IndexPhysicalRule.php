<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexPhysicalRule extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_settings');

        $rules = Setting::where('name', 'physical_rules')->get();

        return view('admin.settings.index-physical-rule', ['rules' => $rules])
            ->extends('admin.layouts.admin');
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