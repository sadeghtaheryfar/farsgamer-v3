<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $comment;
    public $answer;
    public $rating;
    public $is_confirmed;

    public function render()
    {
        $this->authorize('show_comments');

        $comments = Comment::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.comments.comment-component', ['comments' => $comments])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        $this->answer = $this->emptyToNull($this->answer);
        $this->rating = $this->model->commentable_type != 'article' ?: 0;

        return [
            'comment' => ['required', 'string', 'max:250'],
            'answer' => ['nullable', 'string', 'max:250'],
            'rating' => ['required', 'integer', 'between:0,5'],
            'is_confirmed' => ['required', 'boolean'],
        ];
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

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('نظر با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Comment $category)
    {
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