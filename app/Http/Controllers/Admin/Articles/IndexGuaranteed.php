<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Article;
use App\Models\Guaranteed;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexGuaranteed extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_articles');

        $articles = Guaranteed::latest('id')->with('article')
            ->paginate($this->perPage);

        return view('admin.articles.index-guaranteed', ['articles' => $articles])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_articles');

        Guaranteed::findOrFail($id)->delete();

        $this->emitNotify('مقاله با موفقیت حذف شد');
    }
}