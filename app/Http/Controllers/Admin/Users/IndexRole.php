<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;

class IndexRole extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_users');

        $roles = Role::whereNotIn('name', ['administrator', 'super_admin', 'admin', 'همکار','مدیر محصول'])->latest()
            ->paginate($this->perPage);

        return view('admin.users.index-role', ['roles' => $roles])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_users');

        Role::findOrFail($id)->delete();

        $this->emitNotify('نقش با موفقیت حذف شد');
    }
}