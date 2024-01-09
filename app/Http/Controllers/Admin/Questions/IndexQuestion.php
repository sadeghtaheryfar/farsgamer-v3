<?php

namespace App\Http\Controllers\Admin\Questions;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Question;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexQuestion extends BaseComponent
{
    use AuthorizesRequests;

    public $filterConfirmed = 0;

    public function mount()
    {
        $this->data['filterConfirmed'] = [
            '0' => 'همه',
            '1' => 'در انتظار تایید',
            '2' => 'تایید شده',
        ];
    }

    public function render()
    {
        $this->authorize('show_questions');

        $questions = Question::latest()
            ->with('user')
            ->when($this->filterConfirmed, function ($query) {
                return $query->where('is_confirmed', $this->filterConfirmed - 1);
            })
            ->paginate($this->perPage);

        return view('admin.questions.index-question', ['questions' => $questions])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_questions');

        Question::findOrFail($id)->delete();

        $this->emitNotify('پرسش و پاسخ با موفقیت حذف شد');
    }

    public function confirmQuestion($id)
    {
        Question::where('id', $id)->update([
            'is_confirmed' => 1
        ]);

        $this->emitNotify('پرسش و پاسخ با موفقیت تایید شد');
    }
}