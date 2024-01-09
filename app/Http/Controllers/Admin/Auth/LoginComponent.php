<?php

namespace App\Http\Controllers\Admin\Auth;

use Livewire\Component;

class LoginComponent extends Component
{
    public function render()
    {
        dd(111);

        return view('admin.auth.login')
            ->extends('admin.layouts.auth');
    }
}