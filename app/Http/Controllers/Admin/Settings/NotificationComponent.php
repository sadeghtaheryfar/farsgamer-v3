<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NotificationComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $message;

    public function render()
    {
        $this->authorize('show_settings');

        $notifications = Notification::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.settings.notification-component', ['notifications' => $notifications])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'message' => ['required', 'string', 'max:6500'],
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

        $this->saveInDatabase(new Notification());

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('اعلان با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_settings');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Notification::find($id);

        $this->message = $this->model->message;
    }

    public function update()
    {
        $this->authorize('edit_settings');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('اعلان با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Notification $notification)
    {
        $notification->message = $this->message;
        $notification->is_read = 0;
        $notification->save();
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