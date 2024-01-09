<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;

class IndexUser extends BaseComponent
{
    use AuthorizesRequests;

    public $role , $status , $orderStataus;

	protected $queryString = ['status','orderStataus'];

    public function mount()
    {
        $this->data['role'] = Role::whereNotIn('name', ['administrator', 'super_admin'])->get()->pluck('name', 'id');
		$this->data['auth_status'] = User::getAuthStatus();
		$this->data['orderStataus'] = [
			'count' => 'تعداد' , 'payment' => 'مبلغ'
		];
    }

    public function render()
    {
		if (!auth()->user()->hasRole('مدیر محصول')){
			 $this->authorize('show_users');
		}

        $users = User::with('orders')->withCount('orders')->withSum('orders', 'total_price')
			->when($this->orderStataus,function($q){
				if ($this->orderStataus == 'count') {
					return $q->orderByDesc('orders_count');
				} else {
					return $q->orderByDesc('orders_sum_total_price');
				}
				
			})->when($this->role, function ($query){
                return $query->role($this->role);
            })->when($this->status, function ($query){
                return $query->where('auth_status',(int)$this->status);
            });
		if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin')){
			
		}	
		elseif (auth()->user()->hasRole('مدیر محصول'))
		{
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
			$users = $users->whereIn('mobile',$phons);
		}	


        $users = $users->search($this->search)->paginate($this->perPage);

        return view('admin.users.index-user', ['users' => $users])
            ->extends('admin.layouts.admin');
    }
}