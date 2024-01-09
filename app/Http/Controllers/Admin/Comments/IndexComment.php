<?php

namespace App\Http\Controllers\Admin\Comments;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexComment extends BaseComponent
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
        $this->authorize('show_comments');

        $comments = Comment::latest()
            ->with('user')
            ->when($this->filterConfirmed, function ($query) {
                return $query->where('is_confirmed', $this->filterConfirmed - 1);
            })
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.comments.index-comment', ['comments' => $comments])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_comments');

        Comment::findOrFail($id)->delete();

        $this->emitNotify('نظر با موفقیت حذف شد');
    }

    public function confirmComment($id)
    {
        Comment::where('id', $id)->update([
            'is_confirmed' => 1
        ]);

        $this->emitNotify('نظر با موفقیت تایید شد');
    }
}
        