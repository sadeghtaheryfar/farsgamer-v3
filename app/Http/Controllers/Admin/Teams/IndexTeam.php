<?php

namespace App\Http\Controllers\Admin\Teams;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Team;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexTeam extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        $this->authorize('show_vouchers');

        $teams = Team::all();
        return view('admin.teams.index-team', ['teams' => $teams])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_vouchers');

        Team::findOrFail($id)->delete();

        $this->emitNotify('شخض موردنظر با موفقیت حذف شد');
    }
}