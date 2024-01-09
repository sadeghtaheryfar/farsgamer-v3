<?php

namespace App\Http\Controllers\Admin\Articles;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Article;
use App\Models\Guaranteed;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreGuaranteed extends BaseComponent
{
    use AuthorizesRequests;

    public $article_id, $image , $guaranteed;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
			
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }
		
    }

    public function render()
    {
        return view('admin.articles.store-guaranteed')
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

        $this->saveInDatabase(new Guaranteed());

        $this->emitNotify('مقاله با موفقیت ثبت شد');
        $this->resetInputs();
    }

    public function edit($id)
    {
        $this->authorize('edit_articles');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Guaranteed::find($id);
        $this->article_id = $this->model->article_id;
        $this->image = $this->model->image;
    }

    public function update()
    {

        $this->authorize('edit_articles');

        $this->saveInDatabase($this->model);

        $this->emitNotify('مقاله با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Guaranteed $article)
    {
        $this->validate(
            [
                'article_id' => ['nullable'],
                'image' => ['required', 'string', 'max:250']
            ],
            [],
            [
                    'article_id' => 'مقاله',
                    'image' => 'تصویر',
            ]
        );


        $article->article_id = $this->article_id;
        $article->image = $this->image;
        $article->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_articles');

        Guaranteed::findOrFail($id)->delete();

        $this->emitNotify('مقاله با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['article_id','image']);
    }
}