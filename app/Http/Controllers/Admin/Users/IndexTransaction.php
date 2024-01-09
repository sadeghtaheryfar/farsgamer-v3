<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexTransaction extends BaseComponent
{
    use AuthorizesRequests;

    public function render()
    {
        if (!auth()->user()->hasRole('administrator')){
            return abort(403);
        }

        $transaction = Transaction::latest()
            ->paginate($this->perPage);


        return view('admin.users.index-transaction', ['transaction' => $transaction])
            ->extends('admin.layouts.admin');
    }
}