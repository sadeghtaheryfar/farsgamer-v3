<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class FaqComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $question;
    public $answer;
    public $category;

    public function render()
    {
        $this->authorize('show_settings');

        $faqs = Setting::where('name', 'faqs')->get()->pluck('value', 'id');

        return view('admin.settings.faq-component', ['faqs' => $faqs])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'question' => ['required', 'string', 'max:6500'],
            'answer' => ['required', 'string', 'max:6500'],
            'category' => ['required', 'string', 'max:250'],
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

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('سوال با موفقیت ویرایش شد');
    }

    public function saveInDatabase(Setting $setting)
    {
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