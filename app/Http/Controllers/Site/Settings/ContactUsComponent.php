<?php

namespace App\Http\Controllers\Site\Settings;

use App\Models\Setting;
use App\Models\Team;
use App\Models\Partner;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;
use Illuminate\Support\Facades\RateLimiter;

class ContactUsComponent extends Component
{
    public $slider;
    public $description , $name , $family , $email , $mobile , $result , $alert ;

	public $admin , $teams;
    public function mount()
    {
        SEOMeta::setTitle('ارتباط با ما - فارس گیمر');
        SEOMeta::setDescription('ارتباط با فارس گیمر - تماس با فارس گیمر');

        OpenGraph::setTitle('ارتباط با ما - فارس گیمر');
        OpenGraph::setDescription('ارتباط با فارس گیمر - تماس با فارس گیمر');

        TwitterCard::setTitle('ارتباط با ما - فارس گیمر');
        TwitterCard::setDescription('ارتباط با فارس گیمر - تماس با فارس گیمر');

        JsonLd::setTitle('ارتباط با ما - فارس گیمر');
        JsonLd::setDescription('ارتباط با فارس گیمر - تماس با فارس گیمر');

		

		if (auth()->check()){
			$this->name = auth()->user()->name;
			$this->family = auth()->user()->family;
			$this->mobile = auth()->user()->mobile;
			$this->email = auth()->user()->email;
		}

        $this->slider =  explode(',', Setting::getSingleRow('contact_us_slider'));
        $this->description =  Setting::getSingleRow('contact_us_description');
		$this->teams = Team::where('is_admin',0)->get()->toArray();
		$this->admin = Team::where('is_admin',1)->first();
    }

    public function render()
    {
        return view('site.settings.contact-us-component')
            ->extends('site.layouts.site');
    }

	public function newPartner()
	{
		$rateKey = 'register-attempt:' . $this->mobile . '|' . request()->ip();
        if (RateLimiter::tooManyAttempts($rateKey, 5)) {
            
			$this->alert = 'danger';
            return $this->result =  'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.';
        }

        RateLimiter::hit($rateKey, 12 * 60 * 60);

		if (!auth()->check()){
				$this->alert = 'danger';
				return $this->result = 'کاربر گرامی قبل از عملیات درخواست باید ثبت نام کنید.';
			} else {
				$this->result = null;
			}
		$this->validate(
            [
                'name' => ['required', 'string', 'max:250'],
                'family' => ['required', 'string', 'max:250'],
                'mobile' => ['required', 'string','exists:users,mobile', 'size:11','unique:partners,mobile'],
                'email' => ['required', 'string', 'email','max:220'],
            ],
            [],
            [
                    'name' => 'نام',
                    'family' => 'نام خانوادگی',
                    'mobile' => 'موبایل',
                    'email' => 'ایمیل',
            ]
        );
		$parter = new Partner();
        $parter->name = $this->name;
        $parter->family = $this->family;
        $parter->mobile = $this->mobile;
        $parter->email = $this->email;
		
		if ($parter->save()) {
			$this->result = 'درخواست شما با موفقیت ثبت شد لطفا تا اعلام نتیجه منتظر بمانید.';
			$this->alert = 'info';
			$this->reset(['name','family','mobile','email']);
		}
	}
}
