<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use App\Models\Language;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MyLanguage extends BaseComponent
{
	public $myLnag;
	use AuthorizesRequests;
	
   
	public function mount()
	{
		
		
		$this->myLnag = auth()->user()->language;
		$this->mode = 'update';
		
	}

    public function render()
    {
	
             
		$langs = ['basic' => 'basic','eng' => 'eng','arg'=>'arg'];
        return view('admin.settings.my-language',['langs' => $langs])
            ->extends('admin.layouts.admin');
    }


	public function update()
	{
		
		$this->validate(
            [
                'myLnag' => ['required', 'in:basic,eng,arg'],
            ],
            [],
            [
                'myLnag' => 'language',
            ]
        );
		auth()->user()->language = $this->myLnag;
		auth()->user()->save();
		$this->emitNotify('saved');	
	}

	public function resetInputs()
    {
        $this->reset([]);
    }


	
}