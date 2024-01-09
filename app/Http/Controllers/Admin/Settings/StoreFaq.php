<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreFaq extends BaseComponent
{
    use AuthorizesRequests;

    public $question, $answer, $category;

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
        return view('admin.settings.store-faq')
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

        $this->emitNotify('سوال با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_settings');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Setting::find($id);

        $this->question = $this->model->value['question'];
        $this->answer = $this->model->value['answer'];
        $this->category = $this->model->value['category'];
    }

    public function update()
    {
        $this->authorize('edit_settings');

        $this->saveInDatabase($this->model);

        $this->emitNotify('سوال با موفقیت ویرایش شد');
    }

    public function saveInDatabase(Setting $setting)
    {
        $this->validate(
            [
                'question' => ['required', 'string', 'max:6500'],
                'answer' => ['required', 'string', 'max:6500'],
                'category' => ['required', 'string', 'max:250'],
            ],
            [],
            [
                'question' => 'سوال',
                'answer' => 'پاسخ',
                'category' => 'دسته',
            ]
        );

        $setting->name = 'faqs';
        $setting->value = json_encode([
            'question' => $this->question,
            'answer' => $this->answer,
            'category' => $this->category,
        ]);
        $setting->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_settings');

        Setting::findOrFail($id)->delete();

        $this->emitNotify('سوال با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['question', 'answer', 'category']);
    }
}