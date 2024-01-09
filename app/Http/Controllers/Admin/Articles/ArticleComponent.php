<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticleComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $title;
    public $slug;
    public $image;
    public $description;
    //seo
    public $seo_keywords;
    public $seo_description;

    public function render()
    {
        $this->authorize('show_articles');

        $articles = Article::latest()
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.articles.article-component', ['articles' => $articles])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'title' => ['required', 'string', 'max:250'],
            'slug' => ['required', 'string', 'max:250', 'unique:articles,slug,'. ($this->model->id ?? 0)],
            'image' => ['required', 'string', 'max:250'],
            'description' => ['required', 'string', 'max:4000000000'],
            //seo
            'seo_keywords' => ['required', 'string', 'max:65500'],
            'seo_description' => ['required', 'string', 'max:250'],
        ];
    }

    public function create()
    {
        $this->authorize('create_articles');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_articles');

        $this->validate();

        $this->saveInDatabase(new Article());

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('مقاله با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_articles');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Article::find($id);

        $this->title = $this->model->title;
        $this->slug = $this->model->slug;
        $this->description = $this->model->description;
        $this->image = $this->model->image;
        //seo
        $this->seo_keywords = $this->model->seo_keywords;
        $this->seo_description = $this->model->seo_description;
    }

    public function update()
    {
        $this->authorize('edit_articles');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('مقاله با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Article $article)
    {
        $article->title = $this->title;
        $article->slug = $this->slug;
        $article->image = $this->image;
        $article->description = $this->description;
        //seo
        $article->seo_keywords = $this->seo_keywords;
        $article->seo_description = $this->seo_description;
        $article->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_articles');

        Article::findOrFail($id)->delete();

        $this->emitNotify('مقاله با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['title', 'slug', 'image', 'description', 'seo_keywords', 'seo_description']);
    }
}