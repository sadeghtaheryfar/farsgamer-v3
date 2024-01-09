<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Partner;
use App\Models\User;
use App\Http\Controllers\Smsir\Facades\Smsir as SMS;

class IndexPartner extends BaseComponent
{
    use AuthorizesRequests;

	public $status;

	protected $queryString = ['status'];

	public function mount()
	{
		$this->data['status'] = Partner::getStatus();
	}

    public function render()
    {
        $this->authorize('show_users');

    
		$partners = Partner::latest('id')->when($this->status,function($q){
			return $q->where('status',$this->status);
		})->search($this->search)->paginate($this->perPage);

        return view('admin.users.index-partner',['partners'=>$partners])
            ->extends('admin.layouts.admin');
    }

	public function confirmItem($id)
	{
		$this->authorize('edit_users');
		$row = Partner::where('id', $id);
		if ($row->first()->status <> Partner::ACCEPTED) {
			$row->update([
				'status' => Partner::ACCEPTED
			]);
			$user = User::where('mobile',$row->first()->mobile)->first();
			$roles = $user->roles()->pluck('name')->toArray();
			array_push($roles,'همکار');
			$user->syncRoles($roles);
			$textMessage = "کاربر گرامی درخواست شما جهت همکاری با فارس گیمر مورد پذیرش قرار گرفت. \n Farsgamer.com";
			\App\Http\Controllers\Smsir\Facades\Smsir::send($textMessage, $user->mobile);
			$this->emitNotify('درخواست با موفقیت تایید شد');
		}
	}

    public function delete($id)
    {
        $this->authorize('delete_users');

       	$row = Partner::find($id);
		
		$user = User::where('mobile',$row->mobile)->first();
		$roles = $user->roles()->pluck('name')->toArray();
		if (($key = array_search('همکار', $roles)) !== false) {
			unset($roles[$key]);
		}
		$user->syncRoles($roles);
		$row->delete();
		$textMessage = " کاربر گرامی درخواست شما جهت همکاری با فارس گیمر مورد پذیرش قرار نگرفت. \n Farsgamer.com";
		\App\Http\Controllers\Smsir\Facades\Smsir::send($textMessage, $user->mobile);
        $this->emitNotify('درخواست با موفقیت تایید شد');
    }
}