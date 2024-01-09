<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\AdminForm;

class IndexMyForms extends BaseComponent
{
    
    public function render()
    {
      
		$forms = auth()->user()->forms()->latest('id')->get();

        return view('admin.reports.index-my-forms', ['forms'=>$forms])->extends('admin.layouts.admin');
    }
}