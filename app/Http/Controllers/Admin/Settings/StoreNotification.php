<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreNotification extends BaseComponent
{
    use AuthorizesRequests;

    public $message;

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
        return view('admin.settings.store-notification')
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

        $this->saveInDatabase(new Notification());

        $this->resetInputs();
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

        $this->saveInDatabase($this->model);

        $this->emitNotify('اعلان با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Notification $notification)
    {
        $this->validate(
            [
                'message' => ['required', 'string', 'max:6500'],
            ],
            [],
            [
                'message' => 'اعلان',
            ]
        );

        $notification->message = $this->message;
        $notification->is_read = 0;
        $notification->save();
    }

    public function resetInputs()
    {
        $this->reset(['message']);
    }
}