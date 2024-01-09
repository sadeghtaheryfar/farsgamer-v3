<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexFaq extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_settings');

        $faqs = Setting::where('name', 'faqs')->get()->pluck('value', 'id');

        return view('admin.settings.index-faq', ['faqs' => $faqs])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_settings');

        Setting::findOrFail($id)->delete();

        $this->emitNotify('سوال با موفقیت حذف شد');
    }
}