<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SettingComponent extends BaseComponent
{
    use AuthorizesRequests;

    public $setting_name;

    public $url;
    public $image;
	public $charge,$addCharge;
    public $top_alert;
    public $auth_image;
    public $register_wallet;
    public $score_to_wallet;
    public $address;
    public $email;
    public $phone , $lottery, $subject = [], $i = 1 , $start_lottery , $depot_password;
    public $contact_us_description;
    public $cooperation_request_description;
    public $contact_us_slider,$site_close , $passwords = '' , $auth_image_pattern , $auth_description , $admin_numbers;

    public function mount()
    {
        $this->mode = self::MODE_UPDATE;
        $this->top_alert = Setting::where('name', 'top_alert')->first()->value ?? '';
        $this->auth_image = Setting::where('name', 'auth_image')->first()->value ?? '';
        $this->register_wallet = Setting::where('name', 'register_wallet')->first()->value ?? '';
		$this->depot_password = Setting::where('name', 'depot_password')->first()->value ?? '';
        $this->score_to_wallet = Setting::where('name', 'score_to_wallet')->first()->value ?? '';
        $this->address = Setting::where('name', 'address')->first()->value ?? '';
        $this->email = Setting::where('name', 'email')->first()->value ?? '';
        $this->phone = Setting::where('name', 'phone')->first()->value ?? '';
        $this->contact_us_description = Setting::where('name', 'contact_us_description')->first()->value ?? '';
        $this->cooperation_request_description = Setting::where('name', 'cooperation_request_description')->first()->value ?? '';
        $this->contact_us_slider = Setting::where('name', 'contact_us_slider')->first()->value ?? '';
		$this->site_close = Setting::where('name', 'site_close')->first()->value ?? '';
		$this->lottery = Setting::where('name', 'lottery')->first()->value ?? '';
		$this->start_lottery = Setting::where('name', 'start_lottery')->first()->value ?? '';

		$this->auth_image_pattern = Setting::where('name', 'auth_image_pattern')->first()->value ?? '';
		$this->auth_description = Setting::where('name', 'auth_description')->first()->value ?? '';
		$this->admin_numbers = Setting::where('name', 'admin_numbers')->first()->value ?? '';

		$this->subject = Setting::where('name', 'subject')->first()->value ?? [];
		$this->charge = $this->credit();
		if(in_array(auth()->user()->mobile ,['09336332901','09931788937','09921757351','09010235494'])) {
			$this->passwords = Setting::where('name', 'passwords')->first()->value ?? '';
		}
    }

    public function render()
    {
        $this->authorize('show_settings');

        return view('admin.settings.setting-component')
            ->extends('admin.layouts.admin');
    }

    protected function rules()
    {
        return [
            'top_alert' => ['nullable', 'string', 'max:250'],
            'auth_image' => ['required', 'string', 'max:250'],
			'depot_password' => ['required', 'string', 'max:1500'],
            'register_wallet' => ['required', 'integer', 'min:0', 'max:100000'],
            'score_to_wallet' => ['required', 'integer', 'min:0', 'max:100000'],
            'address' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'max:250'],
            'phone' => ['required', 'string', 'max:250'],
            'contact_us_description' => ['required', 'string', 'max:6500'],
            'cooperation_request_description' => ['required', 'string', 'max:6500'],
            'contact_us_slider' => ['required', 'string', 'max:250'],
			'site_close' => ['string', 'max:1'],
			'passwords' => ['nullable','string', 'max:250'],
			'start_lottery' => ['nullable','date'],
			'lottery' => ['nullable','boolean'],
			'subject' => ['nullable','array'],
            'subject.*' => ['required','string','max:70'],
			'auth_image_pattern' => ['required','string','max:240'],
			'auth_image_pattern' => ['required','string','max:240'],
			'auth_description' => ['required','string','max:240'],
        ];
    }

    public function update()
    {
		// dd($this->site_close);
        $this->authorize('edit_settings');

        $this->validate();

        $this->saveInDatabase();

        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
    }

    public function saveInDatabase()
    {
		Setting::updateOrCreate(['name' => 'depot_password'], ['value' => $this->depot_password]);
        Setting::updateOrCreate(['name' => 'top_alert'], ['value' => $this->top_alert]);
        Setting::updateOrCreate(['name' => 'auth_image'], ['value' => $this->auth_image]);
        Setting::updateOrCreate(['name' => 'register_wallet'], ['value' => $this->register_wallet]);
        Setting::updateOrCreate(['name' => 'score_to_wallet'], ['value' => $this->score_to_wallet]);
        Setting::updateOrCreate(['name' => 'address'], ['value' => $this->address]);
        Setting::updateOrCreate(['name' => 'email'], ['value' => $this->email]);
        Setting::updateOrCreate(['name' => 'phone'], ['value' => $this->phone]);
        Setting::updateOrCreate(['name' => 'contact_us_description'], ['value' => $this->contact_us_description]);
        Setting::updateOrCreate(['name' => 'cooperation_request_description'], ['value' => $this->cooperation_request_description]);
        Setting::updateOrCreate(['name' => 'contact_us_slider'], ['value' => $this->contact_us_slider]);
		Setting::updateOrCreate(['name' => 'site_close'], ['value' => $this->site_close]);
		Setting::updateOrCreate(['name' => 'lottery'], ['value' => $this->lottery]);
		Setting::updateOrCreate(['name' => 'start_lottery'], ['value' => $this->start_lottery]);
		Setting::updateOrCreate(['name' => 'subject'], ['value' => json_encode($this->subject) ]);


		Setting::updateOrCreate(['name' => 'auth_image_pattern'], ['value' => $this->auth_image_pattern]);
		Setting::updateOrCreate(['name' => 'auth_description'], ['value' => $this->auth_description ]);
		Setting::updateOrCreate(['name' => 'admin_numbers'], ['value' => $this->admin_numbers ]);

		if(in_array(auth()->user()->mobile ,['09336332901','09931788937','09921757351','09010235494'])) {
			Setting::updateOrCreate(['name' => 'passwords'], ['value' => $this->passwords]);
		}
    }

    public function delete($id)
    {
        $this->authorize('delete_settings');

        Setting::findOrFail($id)->delete();

        $this->emitNotify('تنظیمات با موفقیت حذف شد');
    }

	public function deleteSubject($key)
    {
        unset($this->subject[$key]);
    }

	public function addSubject()
    {
        $this->i = $this->i+ 1;
        array_push($this->subject,'');
    }

	public function credit()
    {
        $url = 'https://inax.ir/webservice.php';
        $fields = [
            'method' => 'credit',
            'username' => '938e6f1c1e8010d84761d010744e2b73',
            'password' => 'fars991399'
        ];
        $fields_string = http_build_query($fields);

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $status = json_decode($result);
        if ($status->code == 1)
            return $status->credit;

        return false;
    }


	public function doChargePanel($amount)
    {
        $url = 'https://inax.ir/webservice.php';
        $fields = [
            'method' => 'addfund',
            'username' => '938e6f1c1e8010d84761d010744e2b73',
            'password' => 'fars991399',
            'amount' => $amount
        ];
        $fields_string = http_build_query($fields);

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
		//dd($result);
        $status = json_decode($result);
        if ($status->code == 1)
            return $status->url;

        return false;
    }


	public function chargePanel()
	{
		if ($this->addCharge >= 1000 && is_numeric($this->addCharge))
		{
			$url = $this->doChargePanel($this->addCharge);
			$this->addCharge = 0;
			return redirect($url);
		}
	}
}