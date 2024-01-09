<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $permissions;

    public $name;
    public $selectedPermissions = [];

    public function mount()
    {
        $this->permissions = Permission::all();

        $this->permissions = $this->permissions->groupBy(function ($item) {
            return explode('_', $item->name)[1];
        })->collect();

        $this->permissions->transform(function ($permission) {
            foreach ($permission as $item) {
                $item->name_label = trans('admin.permission_' . explode('_', $item->name)[0]);
            }
            return $permission;
        });
    }

    public function render()
    {
        $this->authorize('show_users');

        $roles = Role::whereNotIn('name', ['administrator', 'super_admin', 'admin', 'user', 'partner'])->latest()
            ->paginate($this->perPage);

        return view('admin.roles.role-component', ['roles' => $roles])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:250'],
            'selectedPermissions' => ['required', 'array'],
            'selectedPermissions.*' => ['required', 'exists:permissions,name'],
        ];
    }

    public function create()
    {
        $this->authorize('create_users');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_users');

        $this->validate();

        $this->saveInDatabase(new Role());

        $this->setMode(self::MODE_NONE);
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

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('نقش با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Role $role)
    {
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