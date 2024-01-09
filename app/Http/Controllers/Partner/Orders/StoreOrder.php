<?php

namespace App\Http\Controllers\Partner\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\PaymentTransaction;
use App\Models\Product;
use App\Models\User;
use App\Models\Smsir;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Copy;
use App\Models\Setting;
use App\Models\PasswordRequest;
use App\Http\Controllers\Smsir\Facades\Smsir as SMS;

class StoreOrder extends BaseComponent
{
	
    use AuthorizesRequests;
	public $sendedCode;
    public $notes, $sendNote, $noteType, $sms, $sendSms, $payment;
    public $orderStatus, $orderSms;
	public $allow = false;
	public $user_in_order , $hash = true , $desc;

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
    }

   
    public function render()
    {
		
			return view('partner.orders.store-order')
            ->extends('admin.layouts.admin');
		
    }

	
	
    public function edit($id)
    {
       

        $this->setMode(self::MODE_UPDATE);
        $this->model = OrderDetail::with('order')->findOrFail($id);
		$online_time = date("Y-m-d H:i:s");
		$user_online = $this->model->user_online;
		$last_online_time = $this->model->online_time;

		if (!empty($user_online)) {
			if ($user_online == Auth()->user()->id)
			{
				$this->model->online_time = $online_time;
			} else {
				$origin = date_create($last_online_time);
				$target = date_create($online_time);
				$interval = date_diff($origin, $target);
				$m = $interval->format('%i');
				if ($m < 2){
					$this->allow = true;
					
					$this->user_in_order = User::where('id',$user_online)->first()->name;
				} else {
					$this->model->online_time = $online_time;
					$this->model->user_online = Auth()->user()->id;
				}
			}
		} else {
			$this->model->online_time = $online_time;
			$this->model->user_online = Auth()->user()->id;
		}

		$this->model->save();


        $this->orderStatus = $this->model->status;
        $order = $this->model->order;
		
			
        $this->notes = $order->notes()->withTrashed()->get();
        $this->sms = $order->sms;
        $this->payment = PaymentTransaction::where('model_type', 'order')
            ->where('model_id', $order->id)
            ->where('status_code', '100')
            ->first();


			if ($this->payment){
				$date = jalaliDate($this->payment->updated_at);
				$this->desc = "پرداخت به وسیله پرداخت امن {$this->payment->payment_gateway}({$this->payment->payment_ref}) پرداخت شده در {$date} ای پی مشتری  : {$this->model->order->user_ip}";
			}
    }

    public function update()
    {
        $this->authorize('edit_orders');

       

        $this->reset('orderSms');
        $this->emitNotify('سفارش با موفقیت ویرایش شد');
    }

    
    public function resetInputs()
    {
        //set field
    }


}