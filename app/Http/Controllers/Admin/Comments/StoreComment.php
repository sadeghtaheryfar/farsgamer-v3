<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreComment extends BaseComponent
{
    use AuthorizesRequests;

    public $comment, $answer, $rating, $is_confirmed;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
//            $this->create();
            abort(404);
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }
    }

    public function render()
    {
        return view('admin.comments.store-comment')
            ->extends('admin.layouts.admin');
    }

    public function edit($id)
    {
        $this->authorize('edit_comments');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Comment::find($id);

        $this->comment = $this->model->comment;
        $this->answer = $this->model->answer;
        $this->rating = $this->model->rating;
        $this->is_confirmed = $this->model->is_confirmed;
    }

    public function update()
    {
        $this->authorize('edit_comments');

        $this->saveInDatabase($this->model);

        $this->emitNotify('نظر با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Comment $category)
    {
        $this->validate(
            [
                'comment' => ['required', 'string', 'max:250'],
                'answer' => ['nullable', 'string', 'max:250'],
                'rating' => ['required', 'integer', 'between:0,5'],
                'is_confirmed' => ['required', 'boolean'],
            ],
            [],
            [
                'comment' => 'نظر',
                'answer' => 'پاسخ',
                'rating' => 'امتیاز',
                'is_confirmed' => 'وضعیت',
            ]
        );

        $category->comment = $this->comment;
        $category->answer = $this->answer;
        $category->rating = $this->rating;
        $category->is_confirmed = $this->is_confirmed;
        $category->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_comments');

        Comment::findOrFail($id)->delete();

        $this->emitNotify('نظر با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['comment', 'answer', 'rating', 'is_confirmed']);
    }
}