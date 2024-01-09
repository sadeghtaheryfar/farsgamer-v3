<?php

namespace App\Http\Controllers\Site\Dashboard;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Models\Setting;
use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ProfileComponent extends Component
{
	use WithFileUploads;

    public $name, $family, $username, $email;
    public $accountName, $accountBank, $accountCart, $accountSheba;
    public $message , $password , $auth_image_pattern , $auth_description , $file;

    public function mount()
    {
        SEOMeta::setTitle('پروفایل - فارس گیمر');
        OpenGraph::setTitle('پروفایل - فارس گیمر');
        TwitterCard::setTitle('پروفایل - فارس گیمر');
        JsonLd::setTitle('پروفایل - فارس گیمر');

        $user = auth()->user();

        $this->name = $user->name;
        $this->family = $user->family;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->accountName = $user->account_name;
        $this->accountBank = $user->account_bank;
        $this->accountCart = $user->account_cart;
        $this->accountSheba = $user->account_sheba;


		$this->auth_image_pattern = Setting::where('name', 'auth_image_pattern')->first()->value ?? '';
		$this->auth_description = Setting::where('name', 'auth_description')->first()->value ?? '';
    }

    public function render()
    {
        return view('site.dashboard.profile-component')
            ->extends('site.layouts.dashboard');
    }

    public function update()
    {
        $this->accountName = $this->accountName == '' ? null : $this->accountName;
        $this->accountBank = $this->accountBank == '' ? null : $this->accountBank;
        $this->accountCart = $this->accountCart == '' ? null : $this->accountCart;
        $this->accountSheba = $this->accountSheba == '' ? null : $this->accountSheba;

		if (isset($this->password))
		{
			$this->validate(
				[
					'name' => ['required', 'string', 'max:250'],
					'family' => ['required', 'string', 'max:250'],
					'username' => ['required', 'string', 'max:250', 'unique:users,username,' . auth()->id()],
					'email' => ['required', 'string', 'max:250', 'unique:users,email,' . auth()->id()],
					'password' => ['required', 'regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x]).*$/', 'min:6'],
					'accountName' => ['nullable', 'string', 'max:250'],
					'accountBank' => ['nullable', 'string', 'max:250'],
					'accountCart' => ['nullable', 'string', 'max:250'],
					'accountSheba' => ['nullable', 'string', 'max:250'],
				],
				[
					'password.regex' => 'گذرواژه باید حداقل 6 حرف و دارای عدد و حروف باشد'
				],
				[
					'name' => 'نام',
					'family' => 'نام خانوادگی',
					'username' => 'نام کاربری',
					'email' => 'ایمیل',
					'password' => 'گذرواژه',
					'accountName' => 'نام صاحب حساب',
					'accountBank' => 'نام بانک',
					'accountCart' => 'شماره کارت',
					'accountSheba' => 'شمارخ شبا',
				]
			);
			auth()->user()->update([
            'name' => $this->name,
            'family' => $this->family,
            'username' => $this->username,
            'email' => $this->email,
			'password' => $this->password,
            'account_name' => $this->accountName,
            'account_bank' => $this->accountBank,
            'account_cart' => $this->accountCart,
            'account_sheba' => $this->accountSheba,
        ]);
		} else {
			$this->validate(
				[
					'name' => ['required', 'string', 'max:250'],
					'family' => ['required', 'string', 'max:250'],
					'username' => ['required', 'string', 'max:250', 'unique:users,username,' . auth()->id()],
					'email' => ['required', 'string', 'max:250', 'unique:users,email,' . auth()->id()],
					'accountName' => ['nullable', 'string', 'max:250'],
					'accountBank' => ['nullable', 'string', 'max:250'],
					'accountCart' => ['nullable', 'string', 'max:250'],
					'accountSheba' => ['nullable', 'string', 'max:250'],
				],
				[],
				[
					'name' => 'نام',
					'family' => 'نام خانوادگی',
					'username' => 'نام کاربری',
					'email' => 'ایمیل',
					'accountName' => 'نام صاحب حساب',
					'accountBank' => 'نام بانک',
					'accountCart' => 'شماره کارت',
					'accountSheba' => 'شمارخ شبا',
				]
			);
			auth()->user()->update([
            'name' => $this->name,
            'family' => $this->family,
            'username' => $this->username,
            'email' => $this->email,
            'account_name' => $this->accountName,
            'account_bank' => $this->accountBank,
            'account_cart' => $this->accountCart,
            'account_sheba' => $this->accountSheba,
        ]);
		}

        

        $this->message = 'پروفایل با موفقیت تغییر یافت';
    }

	public function auth()
	{
		if (auth()->user()->auth_status == User::USER_NEED_AUTH || auth()->user()->auth_status == User::USER_REJECT_AUTH)
 		{
			$fields = [
            	'file' => ['required','image','mimes:jpg,jpeg,png,PNG,JPG,JPEG','max:1024'],
        	];
			$messages = [
				'file' => 'تصویر احراز هویت',
			];
			$this->validate($fields,[],$messages);
			$image = Storage::disk('media')->put('auth',$this->file);
			auth()->user()->update([
				'file' => $image,
				'auth_status' => User::UESR_PENDING
			]);
			unset($this->file);
		}
	}

	public function updatedFile()
	{
		$this->resetErrorBag();
	}
}
