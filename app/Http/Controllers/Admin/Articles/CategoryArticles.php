<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\ArticleCategory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryArticles extends BaseComponent
{
    use AuthorizesRequests;
    public function render()
    {
        $this->authorize('show_articles');
		if ($this->search) {
 			$articleCategories = ArticleCategory::orderBy('id','DESC')->where('title','like', '%'.$this->search.'%')->paginate($this->perPage);
		} else {
 			$articleCategories = ArticleCategory::orderBy('id','DESC')->paginate($this->perPage);
		}
		foreach ($articleCategories as $case){
			$parent[$case->id] = ArticleCategory::where('id',$case->parent_id);
		}
        return view('admin.articles.category-article',['articleCategories'=>$articleCategories,'parent'=>$parent])
            ->extends('admin.layouts.admin');
    }
    public function delete($id)
    {
        $this->authorize('delete_articles');

        ArticleCategory::findOrFail($id)->delete();

        $this->emitNotify('دسته با موفقیت حذف شد');
    }
}
