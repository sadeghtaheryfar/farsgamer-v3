<?php

namespace App\Http\Controllers\Admin\Questions;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Question;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuestionComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $parent_text;
    public $text;
    public $is_confirmed;

    public function render()
    {
        $this->authorize('show_questions');

        $questions = Question::latest()
            ->paginate($this->perPage);

        return view('admin.questions.question-component', ['questions' => $questions])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        $this->text = $this->emptyToNull($this->text);

        return [
            'parent_text' => ['required', 'string', 'max:6500'],
            'text' => ['nullable', 'string', 'max:6500'],
        ];
    }

    public function edit($id)
    {
        $this->authorize('edit_questions');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Question::find($id);

        $this->parent_text = $this->model->text;
        $this->is_confirmed = $this->model->is_confirmed;
    }

    public function update()
    {
        $this->authorize('edit_questions');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('پرسش و پاسخ با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Question $question)
    {
        $question->text = $this->parent_text;
        $question->is_confirmed = $this->is_confirmed;
        $question->save();

        if (!is_null($this->text)) {
            $newQuestion = new Question();
            $newQuestion->text = $this->text;
            $newQuestion->parent_id = $this->model->id;
            $newQuestion->is_confirmed = 1;
            $newQuestion->product_id = $this->model->product_id;
            $newQuestion->user_id = auth()->id();
            $newQuestion->save();
        }
    }

    public function delete($id)
    {
        $this->authorize('delete_questions');

        Question::findOrFail($id)->delete();

        $this->emitNotify('پرسش و پاسخ با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['parent_text', 'text', 'is_confirmed']);
    }
}