<?php

namespace App\Http\Controllers\Admin\Teams;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Team;
use App\Models\VoucherMeta;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreTeam extends BaseComponent
{
    use AuthorizesRequests;

   
    public $name, $task, $image ,$mode , $is_admin;

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
        return view('admin.teams.store-team')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
		
        $this->authorize('create_articles');

        $this->mode = "create";
    }

    public function store()
    {
		
        $this->authorize('create_articles');

        $this->saveInDatabase(new Team());

        $this->emitNotify(' با موفقیت ثبت شد');
        $this->resetInputs();
    }

    public function edit($id)
    {
        $this->authorize('edit_articles');
		
        $this->mode = "update";
        $this->model = Team::find($id);
        $this->name = $this->model->name;
        $this->task = $this->model->task;
		$this->is_admin = $this->model->is_admin;
        $this->image = $this->model->image;
    }

    public function update()
    {
        $this->authorize('edit_articles');

        $this->saveInDatabase($this->model);

        $this->emitNotify(' با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Team $team)
    {
        $this->validate(
            [
                'name' => ['required', 'string', 'max:250'],
                'task' => ['required', 'string', 'max:250'],
                'image' => ['nullable', 'string'],
            ],
            [],
            [
                    'name' => 'نام',
                    'task' => 'سمت',
                    'image' => 'تصویر',
            ]
        );

        $team->name = $this->name;
        $team->task = $this->task;
		$team->is_admin = $this->is_admin;
        $team->image = $this->image;
        $team->save();
    }

    public function delete($id)
    {
        $this->authorize('delete_articles');

        Article::findOrFail($id)->delete();

        $this->emitNotify(' با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['name', 'task', 'image']);
    }
}