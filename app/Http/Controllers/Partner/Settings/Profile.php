<?php

namespace App\Http\Controllers\Partner\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\PartnerDetail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class Profile extends BaseComponent
{
	public $first_name , $last_name , $telegram , $instagram , $phone , $support_phone1 , $support_phone2 , $support_phone3 , $site_url , $site_name;

	public function resetInputs()
    {
        $this->reset(['first_name', 'last_name', 'telegram', 'instagram', 'phone', 'support_phone1','support_phone2','support_phone3','site_url','site_name']);
    }

	public function mount()
	{
		$this->first_name = auth()->user()->name;
		$this->last_name = auth()->user()->family;

		$this->setMode(self::MODE_UPDATE);
		$this->model = PartnerDetail::where('user_id',auth()->id())->first();
		
		if (!empty($this->model)) {
			$this->first_name = $this->model->first_name;
			$this->last_name = $this->model->last_name;
			$this->telegram = $this->model->telegram;
			$this->instagram = $this->model->instagram;
			$this->site_url = $this->model->site_url;
			$this->site_name = $this->model->site_name;
			$this->phone = $this->model->phone;
			$this->support_phone1 = $this->model->support_phone1;
			$this->support_phone2 = $this->model->support_phone2;
			$this->support_phone3 = $this->model->support_phone3;
		}

	}

	public function update()
    {
        $this->saveInDatabase($this->model);
    }

	private function saveInDatabase($partnerDetail)
    {
        $this->validate(
            [
                'first_name' => ['required', 'string', 'max:250'],
				'last_name' => ['required', 'string', 'max:250'],
				'telegram' => ['required', 'url', 'max:250'],
				'instagram' => ['required', 'url', 'max:250'],
				'site_url' => ['required', 'url', 'max:250'],
				'site_name' => ['required', 'string', 'max:250'],
				'phone' => ['required', 'string', 'max:30'],
				'support_phone1' => ['nullable', 'string', 'max:30'],
				'support_phone2' => ['nullable', 'string', 'max:30'],
				'support_phone3' => ['nullable', 'string', 'max:30'],
            ],
            [],
            [
                'first_name' => 'نام',
				'last_name' => 'نام خانوادگی',
				'telegram' => 'ادرس تلگرام',
				'instagram' => 'ادرس اینستاگرام',
				'site_url' => 'ادرس سایت',
				'site_name' => 'نام فروشگاه',
				'phone' => 'شماره فروشنده',
				'support_phone1' => 'شماره پشتیبان 1',
				'support_phone2' => 'شماره پشتیبان 2',
				'support_phone3' => 'شماره پشتیبان 3',
            ]
        );

		
		PartnerDetail::updateOrCreate(['user_id' => auth()->id()],[
			'first_name' => $this->first_name,
			'last_name' => $this->last_name,
			'telegram' => $this->telegram,
			'instagram' => $this->instagram,
			'site_url' => $this->site_url,
			'site_name' => $this->site_name,
			'phone' => $this->phone,
			'support_phone1' => $this->support_phone1,
			'support_phone2' => $this->support_phone2,
			'support_phone3' => $this->support_phone3,
			'user_id' => auth()->id()
		]);
		$this->emitNotify('اطلاعات با موفقیت ذخیره شد');
    }



    public function render()
    {
        return view('partner.settings.profile')->extends('admin.layouts.admin');
    }
}