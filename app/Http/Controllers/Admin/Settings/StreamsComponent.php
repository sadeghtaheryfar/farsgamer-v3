<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StreamsComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $name, $description, $url, $image,$media;
    public $streams;
	public $allMedia = ['aparat' => 'اپارات' , 'twitch' => 'توییچ'];

    public function mount()
    {
        $this->mode = self::MODE_UPDATE;
    }

    public function render()
    {
        $this->authorize('show_settings');

        $this->streams = Setting::where('name', 'streams')
            ->get()->pluck('value', 'id');

        return view('admin.settings.streams-component')
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:250'],
            'description' => ['required', 'string', 'max:250'],
            'url' => ['required', 'string'],
			'media' => ['required', 'string'],
            'image' => ['required', 'string', 'max:250'],
        ];
    }

    public function addStreams()
    {
		
        $this->resetErrorBag();
        $this->reset(['name', 'description', 'url', 'image','media']);
        $this->emit('showModel', ['streams']);
    }

    public function update()
    {
        $this->authorize('edit_settings');

        $this->validate();

        $this->saveInDatabase();

        $this->emit('hideModel', ['streams']);
        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
    }

    public function saveInDatabase()
    {
        Setting::create([
            'name' => 'streams',
            'value' => json_encode([
                'id' => md5($this->name),
                'name' => $this->name,
                'description' => $this->description,
                'status' => 0,
                'url' => $this->url,
                'image' => $this->image,
				'media' => $this->media
            ])
        ]);
    }

    public function delete($id)
    {
        $this->authorize('delete_settings');

        Setting::findOrFail($id)->delete();

        $this->emitNotify('تنظیمات با موفقیت حذف شد');
    }
}