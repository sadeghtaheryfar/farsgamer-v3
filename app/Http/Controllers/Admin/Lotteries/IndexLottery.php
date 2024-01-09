<?php

namespace App\Http\Controllers\Admin\Lotteries;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class IndexLottery extends BaseComponent
{
    use AuthorizesRequests;

 	public  $status , $tab = 'orders';
    public $filterUserMobile , $filterTrackingCode , $start_at, $end_at;
    protected $queryString = ['status','filterTrackingCode','tab'];

	public function mount()
	{
		$this->end_at = Carbon::now()->format('Y-m-d H:i:s');
		$this->start_at = Carbon::now()->subDays(10)->format('Y-m-d H:i:s');
	}

    public function render()
    {
        $this->authorize('show_lottery');
		$users = [];
		$orders = [];
		$chance = '';
		$lottey_users = 0;
		if ($this->tab == 'orders') {
			$orders = OrderDetail::where('status',Order::STATUS_COMPLETED)->with(['order.notes','order'])->latest('id')
            ->when($this->filterUserMobile, function ($query) {
                return $query->whereHas('order', function ($query) {
                    return $query->where('mobile', $this->filterUserMobile);
                });
            })->when($this->filterTrackingCode, function ($query) {
                return $query->where('order_id', (int)$this->filterTrackingCode - Order::CHANGE_ID);
            })
            ->when($this->status, function ($query) {
                return $query->where('status', $this->status);
            })->has('product')->whereHas('order',function($query){
				return $query->whereBetween('created_at', [$this->start_at, $this->end_at]);
			})->paginate($this->perPage);
		} elseif ($this->tab == 'users') {
			$lottey_users = User::whereHas('details',function($q){
				return $q->whereHas('order', function($q){
					return $q->whereBetween('created_at', [$this->start_at, $this->end_at]);
				})->where('status', Order::STATUS_COMPLETED);
			})->count();
			$users = User::withCount(['details' => function($q) {
			 	return $q->where('status', Order::STATUS_COMPLETED)->whereHas('order',function($q) {
					return $q->whereBetween('created_at', [$this->start_at, $this->end_at]);
				});
			}])->when($this->filterUserMobile, function ($query) {
                	return $query->where('mobile', $this->filterUserMobile);
            })->orderBy('details_count','desc')->paginate($this->perPage + 10);
			$chance = $this->maxChance($users);
		}

		
		// foreach ($users as $user)
		// {
		// 	dd($user->lotteries($this->start_at, $this->end_at));
		// }
		
        return view('admin.lotteries.index-lottery',['orders' =>  $orders ,'users' => $users,'lottey_users' => $lottey_users,'chance' => $chance])
            ->extends('admin.layouts.admin');
    }

	public function maxChance($users)
	{
		$number = 0;
		foreach ($users as $user)
		{
			if ($user->lotteries($this->start_at,$this->end_at) > $number)
			{
				$number = $user->lotteries($this->start_at,$this->end_at);
				$user_name = $user->username;
			}
		}
		return $user_name.' : '.$number;
	}

}