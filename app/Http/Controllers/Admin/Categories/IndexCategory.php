<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexCategory extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_categories');
		

        $categories = Category::latest()
            ->with(['parent'])
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.categories.index-category', ['categories' => $categories])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_categories');

        Category::findOrFail($id)->delete();

        $this->emitNotify('دسته با موفقیت حذف شد');
    }
}