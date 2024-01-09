<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StoreRole extends BaseComponent
{
    use AuthorizesRequests;

    public $permissions;
    public $name, $selectedPermissions = [];

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }

        $this->permissions = Permission::all();
    }

    public function render()
    {
        return view('admin.users.store-role')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
        $this->authorize('create_users');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_users');

        $this->saveInDatabase(new Role());

        $this->emitNotify('نقش با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_users');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Role::find($id);

        $this->name = $this->model->name;
        $this->selectedPermissions = $this->model->permissions()->pluck('name')->toArray();
    }

    public function update()
    {
        $this->authorize('edit_users');

        $this->saveInDatabase($this->model);

        $this->emitNotify('نقش با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Role $role)
    {
        $this->validate(
            [
                'name' => ['required', 'string', 'max:250', 'unique:roles,name,' . ($this->model->id ?? 0)],
                'selectedPermissions' => ['required', 'array'],
                'selectedPermissions.*' => ['required', 'exists:permissions,name'],
            ],
            [],
            [
                'name' => '',
                'selectedPermissions' => '',
                'selectedPermissions.*' => '',
            ]
        );

        $role->name = $this->name;
        $role->save();
        $role->syncPermissions($this->selectedPermissions);
    }

    public function delete($id)
    {
        $this->authorize('delete_users');

        Role::findOrFail($id)->delete();

        $this->emitNotify('نقش با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['name', 'selectedPermissions']);
    }
}