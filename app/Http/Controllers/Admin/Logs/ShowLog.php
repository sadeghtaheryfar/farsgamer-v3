<?php

namespace App\Http\Controllers\Admin\Logs;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Activitylog\Models\Activity;

class ShowLog extends BaseComponent
{
    use AuthorizesRequests;

    public $log;

    public function mount($id)
    {
            $this->show($id);
    }

    public function render()
    {
        return view('admin.logs.show-log')
            ->extends('admin.layouts.admin');
    }

    public function show($id)
    {
        $this->log = Activity::findOrFail($id);
    }
}