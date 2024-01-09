<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexNotification extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_settings');

        $notifications = Notification::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.settings.index-notification', ['notifications' => $notifications])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_settings');

        Notification::findOrFail($id)->delete();

        $this->emitNotify('اعلان با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['message']);
    }
}