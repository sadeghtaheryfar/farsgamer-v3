<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\ArticleCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreArticleCategory extends BaseComponent
{
    use AuthorizesRequests;

    public $title, $slug, $image, $parent_id;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            // abort(404);
        }$this->data['category_id'] = ArticleCategory::pluck('title', 'id');
		
    }

    public function render()
    {
        return view('admin.articles.store-category-article')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
        $this->authorize('create_articles');

        $this->mode = 'create';
    }

    public function store()
    {
		 	
        $this->authorize('create_articles');

        $this->saveInDatabase(new ArticleCategory());

        $this->emitNotify('مقاله با موفقیت ثبت شد');
        $this->resetInputs();
    }
	public $ok = false;
    public function edit($id)
    {
		
        $this->authorize('edit_articles');
	
        $this->mode = 'update';
        $this->model = ArticleCategory::find($id);

			$this->title = $this->model->title;
			$this->slug = $this->model->slug;
			$this->image = $this->model->image;
			$this->parent_id = $this->model->parent_id;
        
    }

    public function update()
    {
        $this->authorize('edit_articles');

        $this->saveInDatabase($this->model);

        $this->emitNotify('دسته بندی با موفقیت ویرایش شد');
    }

    private function saveInDatabase(ArticleCategory $ArticleCategory)
    {
      
			$ArticleCategory->title = $this->title;
			
			if ($this->mode == 'update'){
			if ($this->model->slug <> $this->slug) {
				 $this->validate(
            [
                'title' => ['required', 'string', 'max:250'],
                'slug' => ['required', 'string', 'max:250', 'unique:categories_articles,slug'],
				'image' => ['required'],
				
            ],
            [],
            [
                    'title' => 'عنوان',
                    'slug' => 'نام مستعار ',
					'image' => 'تصویر'
				
                  
            ]
        );
				$ArticleCategory->slug = $this->slug;
			}
			else {
				$this->validate(
            [
                'title' => ['required', 'string', 'max:250'],
                
				'image' => ['required'],
				
            ],
            [],
            [
                    'title' => 'عنوان',
                    
					'image' => 'تصویر'
				
                  
            ]
        );
			}
			} else {
				 $this->validate(
            [
                'title' => ['required', 'string', 'max:250'],
                'slug' => ['required', 'string', 'max:250', 'unique:categories_articles,slug'],
				'image' => ['required'],
				
            ],
            [],
            [
                    'title' => 'عنوان',
                    'slug' => 'نام مستعار ',
					'image' => 'تصویر'
				
                  
            ]
        );
				$ArticleCategory->slug = $this->slug;
			}

			$ArticleCategory->image = $this->image;
			$ArticleCategory->parent_id = $this->parent_id;
			// dd($$ArticleCategory);
			$ArticleCategory->save();
    }

    // public function delete($id)
    // {
    //     $this->authorize('delete_articles');

    //     Article::findOrFail($id)->delete();

    //     $this->emitNotify('مقاله با موفقیت حذف شد');
    // }

    public function resetInputs()
    {
        $this->reset(['title', 'slug', 'image' , 'parent_id']);
    }
}