<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreArticle extends BaseComponent
{
    use AuthorizesRequests;

    public $title, $slug, $image, $description, $seo_keywords, $seo_description,$parent_id ;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
			
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }
		
		$this->data['category_id'] = ArticleCategory::pluck('title', 'id');
    }

    public function render()
    {
        return view('admin.articles.store-article')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
		
        $this->authorize('create_articles');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
		
        $this->authorize('create_articles');

        $this->saveInDatabase(new Article());

        $this->emitNotify('مقاله با موفقیت ثبت شد');
        $this->resetInputs();
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
		if (!empty($this->model->categories->id)) {
			$this->parent_id = $this->model->categories->id;
		} 
        //seo
        $this->seo_keywords = $this->model->seo_keywords;
        $this->seo_description = $this->model->seo_description;
    }

    public function update()
    {
        $this->authorize('edit_articles');

        $this->saveInDatabase($this->model);

        $this->emitNotify('مقاله با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Article $article)
    {
        $this->validate(
            [
                'title' => ['required', 'string', 'max:250'],
                'slug' => ['required', 'string', 'max:250', 'unique:articles,slug,'. ($this->model->id ?? 0)],
                'image' => ['required', 'string', 'max:250'],
                'description' => ['required', 'string', 'max:4000000000'],
				'parent_id' => ['required'],
                //seo
                'seo_keywords' => ['required', 'string', 'max:65500'],
                'seo_description' => ['required', 'string', 'max:250'],
            ],
            [],
            [
                    'title' => 'عنوان',
                    'slug' => 'آدرس',
                    'image' => 'تصویر',
                    'description' => 'توضیحات',
					'parent_id' => 'دسته بندی',
                    'seo_keywords' => 'کلمات کلیدی سئو',
                    'seo_description' => 'توضیحات سئو',
            ]
        );

        $article->title = $this->title;
        $article->slug = $this->slug;
        $article->image = $this->image;
        $article->description = $this->description;
		$article->category_id = $this->parent_id;
		
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