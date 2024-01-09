<?php

namespace App\Http\Controllers\Admin\Logs;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Activitylog\Models\Activity;

class LogComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $logKey = 0;

    public function updatedLogKey()
    {
        $this->mode = self::MODE_SHOW;
    }

    public function render()
    {
        $this->authorize('show_logs');

        $logs = Activity::latest()
            ->paginate($this->perPage);

        return view('admin.logs.log-component', ['logs' => $logs])
            ->extends('admin.layouts.admin');
    }

    public function resetInputs()
    {
        //
    }
}