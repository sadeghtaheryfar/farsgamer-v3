<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use App\Models\Window;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class WindowComponent extends BaseComponent
{
	use AuthorizesRequests;

	public $windows = [];

	public function mount()
	{
		 $this->authorize('show_settings');

		$this->windows = Window::all();
				
	}

	public function render()
	{
		  return view('admin.settings.window-component')
            ->extends('admin.layouts.admin');
	}

	public function delete($id)
    {
        $this->authorize('delete_settings');

        Window::findOrFail($id)->delete();

        $this->emitNotify('تنظیمات با موفقیت حذف شد');

		$this->mount();
    }

}