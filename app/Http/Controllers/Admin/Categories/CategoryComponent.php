<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $title;
    public $slug;
    public $image;
    public $parent_id;

    public function render()
    {
        $this->authorize('show_categories');

        $this->data['parent_id'] = Category::whereNull('parent_id')
            ->where('id', '!=', $this->model->id ?? 0)
            ->get()->pluck('title', 'id');

        $categories = Category::latest()
            ->with(['parent'])
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.categories.category-component', ['categories' => $categories])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        $this->parent_id = $this->emptyToNull($this->parent_id);

        return [
            'title' => ['required', 'string', 'max:250'],
            'slug' => ['required', 'string', 'max:250', 'unique:categories,slug,'. ($this->model->id ?? 0)],
            'image' => ['required', 'string', 'max:250'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ];
    }

    public function create()
    {
        $this->authorize('create_categories');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_categories');

        $this->validate();

        $this->saveInDatabase(new Category());

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('دسته با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_categories');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Category::find($id);

        $this->title = $this->model->title;
        $this->slug = $this->model->slug;
        $this->image = $this->model->image;
        $this->parent_id = $this->model->parent_id;
    }

    public function update()
    {
        $this->authorize('edit_categories');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('دسته با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Category $category)
    {
        $category->title = $this->title;
        $category->slug = $this->slug;
        $category->image = $this->image;
        $category->parent_id = $this->parent_id;
        $category->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_categories');

        Category::findOrFail($id)->delete();

        $this->emitNotify('دسته با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['title', 'slug', 'image', 'parent_id']);
    }
}