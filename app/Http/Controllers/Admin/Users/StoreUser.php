<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\User;
use App\Models\Score;
use App\Models\Product;
use Bavix\Wallet\Exceptions\BalanceIsEmpty;
use Bavix\Wallet\Exceptions\InsufficientFunds;
use Bavix\Wallet\Models\Transaction;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;
use App\Models\Schedule;
use App\Models\Overtime;
use App\Models\PaymentTransaction;

class StoreUser extends BaseComponent
{
    use AuthorizesRequests;

    public $name, $family, $username, $mobile, $email;
    public $account_name, $account_bank, $account_cart, $account_sheba , $language;
    public $userWallet = [];
    public $walletType, $walletAmount, $walletDescription;
    public $roles = [] ,  $score , $must_login_by_sms , $manager_start_date;
	 // schedules
    public $saturday , $sunday , $monday , $tuesday , $wednesday, $thursday, $friday;
	public $saturday1 , $sunday1 , $monday1 , $tuesday1 , $wednesday1, $thursday1, $friday1 , $new_note;
    // overtimes
    public $start_at , $end_at , $overtimes = [] , $password , $phone , $auth_status , $auth_result , $notes = [];

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
//            $this->create();
            abort(404);
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }

        $this->data['role'] = Role::whereNotIn('name', ['administrator', 'super_admin'])->latest()->get();
		$this->data['auth_status'] = User::getAuthStatus();
    }

    public function render()
    {
		if($this->mode == "update"){
			$this->overtimes = Overtime::where('user_id',$this->model->id)->get();
		}

		$langs = ['basic' => 'basic','eng' => 'eng','arg'=>'arg'];
        return view('admin.users.store-user',['langs' => $langs])
            ->extends('admin.layouts.admin');
    }

    public function edit($id)
    {
		$this->setMode(self::MODE_UPDATE);
		
		if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin'))
		{
			$this->model = User::findOrFail($id);
			$this->authorize('edit_users');
			
			$deposit = Score::where('user_id', auth()->id())
				->where('type', Score::TYPE_DEPOSIT)->sum('amount');
			$withdraw = Score::where('user_id', auth()->id())
				->where('type', Score::TYPE_WITHDRAW)->sum('amount');

			$this->score = $deposit - $withdraw;
			
		

			
			$this->must_login_by_sms = $this->model->must_login_by_sms;
			$this->account_name = $this->model->account_name;
			$this->account_bank = $this->model->account_bank;
			$this->account_cart = $this->model->account_cart;
			$this->account_sheba = $this->model->account_sheba;
			$this->language = $this->model->language;
			$this->phone = $this->model->mobile;

			$this->auth_status = $this->model->auth_status;
			$this->auth_result = $this->model->auth_result;

			$this->manager_start_date = $this->model->manager_start_date;

			$this->userWallet = $this->model->walletTransactions()->where('confirmed', 1)->get();

			$this->roles = $this->model->roles()->pluck('name')->toArray();
			} elseif (auth()->user()->hasRole('مدیر محصول')){
			$users_phone = Product::where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%')
            ->select(['manager_mobile','id'])->get()->pluck('manager_mobile','id')->map(function($item){
				return explode(',',$item);
			})->toArray();
			$phons = [];
			foreach ($users_phone as $item)
			{
				foreach ($item as $value)
				{
					$phons[] = $value;
				}
			}
			$phons = array_unique($phons);
			$this->model = User::whereIn('mobile',$phons)->findOrFail($id);
			
			}

		$this->name = $this->model->name;
		$this->family = $this->model->family;
		$this->username = $this->model->username;
		$this->email = $this->model->email;
		$this->mobile = $this->model->mobile;

		$this->saturday = $this->model->schedule->saturday ?? null;
        $this->sunday = $this->model->schedule->sunday ?? null;
        $this->monday = $this->model->schedule->monday ?? null;
        $this->tuesday = $this->model->schedule->tuesday ?? null;
        $this->wednesday = $this->model->schedule->wednesday ?? null;
        $this->thursday = $this->model->schedule->thursday ?? null;
        $this->friday = $this->model->schedule->friday ?? null;
		
		$this->notes = $this->model->notes;
		
    }

    public function update()
    {
		if (!auth()->user()->hasRole('مدیر محصول')){
        	$this->authorize('edit_users');
		}

        $this->saveInDatabase($this->model);

        
    }

    private function saveInDatabase(User $user)
    {
		if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin') ){
			$this->validate(
				[
					'name' => ['nullable', 'string', 'max:250'],
					'family' => ['nullable', 'string', 'max:250'],
					'username' => ['required', 'string', 'max:250', 'unique:users,username,' . $this->model->id],
					'roles' => ['nullable', 'array'],
					'roles.*' => ['required', 'exists:roles,name'],
					'language' => ['required','in:basic,eng,arg'],
					'phone' => ['required','size:11','unique:users,mobile,' . $this->model->id],
					'manager_start_date' => ['nullable','date_format:Y-m-d']
				],
				[],
				[
					'name' => 'نام',
					'family' => 'نام خانوادگی',
					'username' => 'نام کاربری',
					'roles' => 'نقش ها',
					'roles.*' => 'نقش',
					'language' => 'زبان',
					'phone' => 'شماره همراه',
					'manager_start_date' => 'تاریخ محاسبه مستندات مدیر محصول'
				]
			);

			$user->name = $this->name;
			$user->family = $this->family;
			$user->must_login_by_sms = $this->must_login_by_sms;
			$user->username = $this->username;
			$user->language = $this->language;
			$user->mobile = $this->phone;
			$user->manager_start_date = $this->manager_start_date;
			if (isset($this->password) && !empty($this->password))
				$user->password = $this->password;

			$user->save();
			if (auth()->check() && auth()->user()->hasRole('super_admin')) {
				$user->syncRoles($this->roles);
			}
		}
		
		$this->saturday1 = explode('-',$this->saturday);


        $this->sunday1 = explode('-',$this->sunday);
        $this->monday1 = explode('-',$this->monday);
        $this->tuesday1 = explode('-',$this->tuesday);
        $this->wednesday1 = explode('-',$this->wednesday);
        $this->thursday1 = explode('-',$this->thursday);
        $this->friday1 = explode('-',$this->friday);
		
		if ($this->checkArray($this->saturday1,$this->sunday1,$this->monday1,$this->tuesday1,$this->wednesday1,$this->thursday1,$this->friday1) )
			return $this->addError('error','خطا در فرمت ورودی');
		
		$this->validate(
				[
					'saturday1' => 'nullable|array',
					'saturday1.*' => ['nullable', 'date_format:H:i'],
					'sunday1.*' => ['nullable', 'date_format:H:i'],
					'tuesday1.*' => ['nullable', 'date_format:H:i'],
					'wednesday1.*' => ['nullable', 'date_format:H:i'],
					'thursday1.*' => ['nullable', 'date_format:H:i'],
					'friday1.*' => ['nullable', 'date_format:H:i'],
					'monday1.*' => ['nullable', 'date_format:H:i'],
				],
				[],
				[
					'saturday1' => 'شنبه',
					'sunday1' => 'یکشنبه',
					'monday1' => 'دوشنبه',
					'tuesday1' => 'سه شنبه',
					'wednesday1' => 'چهار شنبه',
					'thursday1' => 'پنج شنبه',
					'friday1' => 'جمعه',
					
				]
			);

		$this->saturday = implode('-',$this->saturday1);
        $this->sunday = implode('-',$this->sunday1);
        $this->monday = implode('-',$this->monday1);
        $this->tuesday = implode('-',$this->tuesday1);
        $this->wednesday = implode('-',$this->wednesday1);
        $this->thursday = implode('-',$this->thursday1);
        $this->friday = implode('-',$this->friday1);

		


		


		 Schedule::updateOrCreate(['user_id'=>$user->id],[
            'saturday' => $this->saturday,'sunday' => $this->sunday,'monday' => $this->monday,'tuesday' => $this->tuesday,
            'wednesday' => $this->wednesday,'thursday' => $this->thursday,'friday'=> $this->friday
        ]);

		$this->resetErrorBag();
		$this->emitNotify('کاربر با موفقیت ویرایش شد');
        
    }

	public function newNote()
	{
		$this->validate(
				[
					'new_note' => ['required', 'string'],
					
				],
				[],
				[
					'new_note' => 'متن یادداشت',
				]
			);

		$item = $this->model->notes()->create([
			'author_id' => auth()->id(),
			'text' => $this->new_note
		]);

		$this->notes->push($item);
		$this->emitNotify('یادداشت با موفقیت ثبت شد');
	}

    public function walletAction()
    {
		if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin')){
			$this->validate(
				[
					'walletType' => ['required', 'in:deposit,withdraw'],
					'walletAmount' => ['required', 'integer', 'min:0', 'max:5000000'],
					'walletDescription' => ['required', 'string', 'max:250'],
				],
				[],
				[
					'walletType' => 'نوع تراکنش',
					'walletAmount' => 'مبلغ تراکنش',
					'walletDescription' => 'توضیحات تراکنش',
				]
			);

			if ($this->walletType == Transaction::TYPE_DEPOSIT) {
				$this->model->deposit($this->walletAmount, ['description' => $this->walletDescription, 'from_admin'=> true]);
				PaymentTransaction::create([
                        'amount' => $this->walletAmount,
                        'payment_gateway' => 'واریز دستی',
                        'payment_token' => uniqid(),
                        'model_type' => 'transaction',
                        'model_id' => $this->model->id,
                        'user_id' => auth()->id(),
						'status_code' => '100',
						'status_message' => "به حساب {$this->model->username}-{$this->model->mobile}"
                    ]);
			} else {
				try {
					$this->model->forceWithdraw($this->walletAmount, ['description' => $this->walletDescription, 'from_admin'=> true]);
					PaymentTransaction::create([
                        'amount' => $this->walletAmount,
                        'payment_gateway' => 'برداشت دستی',
                        'payment_token' => uniqid(),
                        'model_type' => 'transaction',
                        'model_id' => $this->model->id,
                        'user_id' => auth()->id(),
						'status_code' => '100',
						'status_message' => "از حساب {$this->model->username}-{$this->model->mobile}"
                    ]);
				} catch (BalanceIsEmpty | InsufficientFunds $exception) {
					$this->addError('walletAmount', $exception->getMessage());
				}
			}

			$this->userWallet = $this->model->walletTransactions()->where('confirmed', 1)->get();

			$this->reset(['walletType', 'walletAmount', 'walletDescription']);
			$this->emitNotify('کیف پول کاربر با موفقیت ویرایش شد');
		}
    }

    public function resetInputs()
    {
        //
    }

	public function deleteOverTimer($id)
    {
        $this->authorize('edit_users');
        Overtime::findOrfail($id)->delete();
    }

    public function newOverTime()
    {
		if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin')) {
        	$this->authorize('edit_users');
		}
        if ($this->mode == 'update'){
            $this->validate([
                'start_at' => ['required','date_format:Y-m-d H:i'],
                'end_at' => ['required','date_format:Y-m-d H:i'],
            ],[],[
                'start_at' => 'تاریخ شروع',
                'end_at' => 'تاریخ پایان',
            ]);
            $overtime = new Overtime();
            $overtime->user_id = $this->model->id;
            $overtime->start_at = $this->start_at;
            $overtime->end_at = $this->end_at;
            $overtime->manger = auth()->id();
            $overtime->save();
            $this->reset(['start_at','end_at']);
            $this->emitNotify('اطلاعات با موفقیت ثبت شد');
        }
    }

	public function checkArray(...$array)
	{
		
		foreach ($array as $item)
			if (!empty(@$item[0]) && !empty(@$item[1]) && count($item) != 2)
				return true;

		return false;	
	}

	public function auth()
	{
		if ($this->auth_status != $this->model->auth_status) {
			$this->model->update([
				'auth_status' => $this->auth_status,
				'auth_result' => $this->auth_result,
				'checked_by' => auth()->id()
			]);
			$text = \App\Http\Controllers\Smsir\Facades\Smsir::getUserAuthText($this->model,$this->auth_status);
			\App\Http\Controllers\Smsir\Facades\Smsir::send($text,$this->model->mobile );
			$this->emitNotify('اطلاعات با موفقیت ثبت شد');
		}
		
	}
}