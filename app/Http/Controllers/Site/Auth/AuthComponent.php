<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Smsir\Facades\Smsir;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventMail;

class AuthComponent extends Component
{
    const MODE_REGISTER = 'register';
    const MODE_LOGIN = 'login';
    const MODE_VERIFY = 'verify';

    public $mode = self::MODE_LOGIN;

    public $username;
    public $mobile;
    public $password;
	public $passwords , $passwords_confirm;

	public $sms = false , $sent = false;

	public $is_registration = false;

    public function updatedMode()
    {
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('site.auth.auth')
            ->extends('site.layouts.auth', ['background' => Setting::getSingleRow('auth_image')]);
    }

    public function register()
    {
		$this->sent = false;
		$this->is_registration = true;
        $this->validate(
            [
                'username' => ['required', 'string', 'max:250', 'unique:users,username'],
                'mobile' => ['required', 'regex:/(09)[0-9]{9}/', 'unique:users,mobile'],
				'passwords' => ['required', 'regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x]).*$/', 'min:6'],
				'passwords_confirm' => ['required'],
            ],
            [
                'mobile.unique' => 'قبلا ثبت نام کرده اید لطفا وارد شوید',
				'passwords.regex' => 'گذرواژه باید حداقل 6 حرف و دارای عدد و حروف باشد'
            ],
            [
                'username' => 'نام کاربری',
                'mobile' => 'موبایل',
				'passwords' => 'گذرواژه',
				'passwords_confirm' => 'تایید گذرواژه'
            ]
        );

        $rateKey = 'register-attempt:' . $this->mobile . '|' . request()->ip();
        if (RateLimiter::tooManyAttempts($rateKey, 5)) {
            $this->resetInputs();

            return $this->addError('mobile', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
        }

        RateLimiter::hit($rateKey, 12 * 60 * 60);

        $otp = $this->generateOTP();
        $password = $this->generatePassword();

		if ($this->passwords == $this->passwords_confirm)
		{
			DB::transaction(function () use ($otp, $password) {
						$user = User::create([
							'username' => $this->username,
							'mobile' => $this->mobile,
							'password' => $this->passwords,
							'otp' => $otp,
							'verify' => 0
						]);
						
						$registerWallet = (int) Setting::getSingleRow('register_wallet', 0);
						if ($registerWallet > 0) {
							$user->deposit($registerWallet, ['description' => 'اختصاص اعتبار هدیه برای ثبت نام درفارس گیمر']);
						}
					});
		} else {
			 return $this->addError('passwords_confirm', 'گذواژه وارد شده تایید نشد , لطفا دوباره تلاش کنید');
		}
       
	   	$this->sendOtp($otp);
        // Smsir::sendVerification($this->mobile, $otp);

        $this->mode = self::MODE_VERIFY;
    }

    public function login()
    {
		$this->is_registration = false;
        $this->validate(
            [
                'mobile' => ['required', 'regex:/(09)[0-9]{9}/', 'exists:users,mobile'],
            ],
            [
                'mobile.exists' => 'شماره شما یافت نشد لطفا ثبت نام کنید'
            ],
            [
                'mobile' => 'موبایل'
            ]
        );

        $rateKey = 'login-attempt:' . $this->mobile . '|' . request()->ip();
        if (RateLimiter::tooManyAttempts($rateKey, 30)) {
            $this->resetInputs();

            return $this->addError('mobile', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
        }

		
        RateLimiter::hit($rateKey, 12 * 60 * 60);

        


        $this->mode = self::MODE_VERIFY;
    }

    public function verify()
    {
        $this->validate([
            'mobile' => ['required', 'regex:/(09)[0-9]{9}/', 'exists:users,mobile'],
            'password' => ['required', 'string'],
        ]);

        $rateKey = 'verify-attempt:' . $this->mobile . '|' . request()->ip();
        if (RateLimiter::tooManyAttempts($rateKey, 5)) {
            $this->resetInputs();

            return $this->addError('mobile', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
        }

        RateLimiter::hit($rateKey, 12 * 60 * 60);

        $user = User::where('mobile', $this->mobile)->first();

		
        if ($this->is_registration === false && (\Hash::check($this->password, $user->otp) || \Hash::check($this->password, $user->password)) ) {

			if ($user->must_login_by_sms && !(\Hash::check($this->password, $user->otp)) ){
				 return $this->addError('mobile', 'ورود با رمز اصلی برای شما فعال نمی باشد');
			} else{
				Auth::login($user, true);
				request()->session()->regenerate();
				RateLimiter::clear($rateKey);
				if (auth()->user()->hasRole('admin')){
					return redirect()->intended(route('admin.dashboard'));
				} elseif(auth()->user()->hasRole('همکار')) {
					return redirect()->intended(route('partner.orders'));
				}

				return redirect()->intended(route('home'));
			}
        } elseif ($this->is_registration === true && \Hash::check($this->password, $user->otp) ) {
			$user['verify'] = 1;
			$user->save();
			Auth::login($user, true);

            request()->session()->regenerate();

            RateLimiter::clear($rateKey);

            if (auth()->user()->hasRole('admin')){
            	return redirect()->intended(route('admin.dashboard'));
            } elseif(auth()->user()->hasRole('همکار')) {
				return redirect()->intended(route('partner.orders'));
			}

            return redirect()->intended(route('home'));
		}

        // if (Auth::attempt(['mobile' => $this->mobile, 'password' => $this->password], true) ) {
        //     request()->session()->regenerate();

        //     RateLimiter::clear($rateKey);

        //     if (auth()->user()->hasRole('admin')){
        //         return redirect()->intended(route('admin.dashboard'));
        //     }

        //     return redirect()->intended(route('home'));
        // }

        return $this->addError('mobile', trans('auth.failed'));
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('home');
    }

    private function generateOTP()
    {
        if (app()->environment('local')) {
            return 12345;
        } else {
            return rand(10100, 90900);
        }
    }

    private function generatePassword()
    {
        return Str::random(8);
    }

    private function resetInputs()
    {
        $this->reset(['username', 'mobile', 'password']);
    }

	public $result;
	public function sendOtp()
	{
		if ($this->sent && $this->checkTimer())
            return $this->addError('password','رمز یکبار مصرف قبلا برای شما ارسال شده است.');


		$otp = $this->generateOTP();

        $user = User::where('mobile', $this->mobile)->first();
		$user['otp'] = $otp;
	
		if ($user->verify == 0 && $this->is_registration === false)
		{
			// $this->sendOtp($otp);
			$this->is_registration = true;
		}
        
        $user->save();	

		Smsir::sendVerification($this->mobile, $otp);
		$this->result = 'رمز یکبار مصرف برای شما ارسال شد';
		Session::put('timer', Carbon::make(now())->addSeconds(90));
        $this->setTimer();
        $this->sms = true;
        $this->sent = true;
	}

	public function sendOtpEmail()
	{
		if ($this->sent && $this->checkTimer())
            return $this->addError('password','رمز یکبار مصرف قبلا برای شما ارسال شده است.');

		$otp = $this->generateOTP();

        $user = User::where('mobile', $this->mobile)->first();
		$user['otp'] = $otp;
	
		if ($user->verify == 0 && $this->is_registration === false)
		{
			// $this->sendOtp($otp);
			$this->is_registration = true;
		}
        
        $user->save();	
		if (!empty($user->email)) {
			Mail::to($user->email)->send(new EventMail('کد تایید احراز هویت',$otp));
			$this->result = 'رمز یکبار مصرف برای شما ارسال شد';
			Session::put('timer', Carbon::make(now())->addSeconds(90));
			$this->setTimer();
			$this->sms = true;
			$this->sent = true;
		}
	}

	public function canSendAgain()
    {
        $this->sent = false;
    }

	public function checkTimer(): bool
    {
        $interval = Carbon::make(now())->diff(Carbon::make(Session::get('timer')));
        return ((int)$interval->format("%r%s") > 0);
    }

	public function setTimer()
    {
        $this->emit('timer',['data' => Session::get('timer') ? Session::get('timer')->toDateTimeString() : '' ]);
    }

	public function checkSession()
    {
        if ($this->checkTimer())
        {
            $this->sent = true;
            $this->setTimer();
        }
    }
}