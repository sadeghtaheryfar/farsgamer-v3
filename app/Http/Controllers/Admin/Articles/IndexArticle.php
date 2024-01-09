<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexArticle extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_articles');

        $articles = Article::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.articles.index-article', ['articles' => $articles])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_articles');

        Article::findOrFail($id)->delete();

        $this->emitNotify('مقاله با موفقیت حذف شد');
    }
}