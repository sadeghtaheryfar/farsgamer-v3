<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use App\Models\Language;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexLanguage extends BaseComponent
{
	public $words;
	use AuthorizesRequests;
	
   
	public function mount()
	{
		
		$this->words = Language::latest('id')->get()->toArray();

		$this->mode = 'update';
		
	}

    public function render()
    {
	
        $this->authorize('show_settings');

        

        return view('admin.settings.index-language')
            ->extends('admin.layouts.admin');
    }


	public function update()
	{
		$this->validate(
            [
                'words.*.basic' => ['required', 'string', 'max:250'],
                'words.*.eng' => ['required', 'string', 'max:250'],
                'words.*.arg' => ['required', 'string', 'max:250'],
            ],
            [],
            [
                'words.*.basic' => 'فارسی',
                'words.*.eng' => 'انگلیسی',
                'words.*.arg' => 'ارژانتینی',
            ]
        );
		foreach ($this->words as $key => $word){
			$this->validate(
				[
					'words.'.$key.'.basic' => ['unique:languages,basic,'.($word['id'])],
				],
				[],
				[
					'words.*.basic' => 'فارسی',
				]
			);
			// Language::updateOrCreate();
			if ($word['id'] != 0){
				Language::find($word['id'])->update(['basic' => $word['basic'] , 'eng'=> $word['eng'] , 'arg' => $word['arg']]);
			} else {
				 $this->words[$key] = Language::create([
					'basic' => $word['basic'],
					'eng' => $word['eng'],
					'arg' => $word['arg']
				]);
			}
		}

		$this->emitNotify('کلمات با موفقیت ویرایش شد');	
	}

	public function resetInputs()
    {
        $this->reset([]);
    }

	public function addWord()
	{
		array_push($this->words,['id' => 0 , 'basic' => '' , 'eng' => '' , 'arg' => '']);
	}

	public function delete($key)
	{
		 $this->authorize('delete_settings');
		 $id = $this->words[$key]['id'];
		unset($this->words[$key]);
		if ($id != 0)
			Language::find($id)->delete();

		$this->emitNotify('کلمه با موفقیت حذف شد');	
	}
}