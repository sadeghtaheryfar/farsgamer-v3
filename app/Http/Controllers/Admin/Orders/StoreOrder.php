<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\PaymentTransaction;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Smsir;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Copy;
use App\Models\Setting;
use App\Models\PasswordRequest;
use App\Http\Controllers\Smsir\Facades\Smsir as SMS;
use App\Models\CurrencyHistory;
use App\Models\DepotItem;
use App\Models\Depot;
use Illuminate\Support\Facades\Http;

class StoreOrder extends BaseComponent
{
	
    use AuthorizesRequests;
	public $sendedCode;
    public $notes, $sendNote, $noteType, $sms, $sendSms, $payment , $admin_phone;
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

    public function updatedOrderStatus()
    {
        $this->orderSms = \App\Http\Controllers\Smsir\Facades\Smsir::getUserText($this->model->order,
            $this->model, $this->orderStatus);
    }

    public function render()
    {
		
			return view('admin.orders.store-order')
            ->extends('admin.layouts.admin');
		
    }

	public function SmiCardCharge($number)
	{
		if (isset($number) && strlen($number) == 11 && is_numeric($number))
		{
			$operator = null;
			$sim_codes = [
				'MCI' => ['0910','0911','0912','0913','0914','0915','0916','0917','0918','0919','0990','0991','0992','0993','0994'],
				'MTN' => ['0930','0933','0935','0936','0937','0938','0939','0901','0902','0903','0904','0905','0941'],
				'RTL' => ['0920','921','0922'],
			];

			$number_code = substr("$number",'0','4');
			foreach ($sim_codes as $sim => $sim_code)
			{
				if (in_array("$number_code",$sim_code))
				{
					$operator = $sim;
					break;
				}
			}
			if ($operator === null)
				return false;

			$url = 'https://inax.ir/webservice.php';
			$fields = [
				'method' => 'topup',
				'username' => '938e6f1c1e8010d84761d010744e2b73',
				'password' => 'fars991399',
				'operator' => $operator,
				'amount' => 1000,
				'mobile' => $number,
				'order_id' => time(),
				'charge_type' => 'normal'
			];
			$fields_string = http_build_query($fields);

			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, true);
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
			@$result = curl_exec($ch);
			@$status = json_decode($result);
			if (@$status->code == 1)
				return true;
		}
		return false;
	}
	public function updateTime()
	{
		$online_time = date("Y-m-d H:i:s");
		$user_online = $this->model->user_online;
		if ($user_online == auth()->user()->id)
			{
				$this->model->online_time = $online_time;
				$this->model->save();
			}
	}
    public function edit($id)
    {
        $this->authorize('show_orders');

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

        $this->saveInDatabase($this->model);

        $this->reset('orderSms');
        $this->emitNotify('سفارش با موفقیت ویرایش شد');
    }

    private function saveInDatabase(OrderDetail $orderDetail)
    {
        $this->validate(
            [
                'orderStatus' => ['required']
            ],
            [],
            [
                'orderStatus' => 'وضعیت سفارش'
            ]
        );

        $status = $orderDetail->status;
        $orderDetail->status = $this->orderStatus;
        $orderDetail->save();

        if ($status != $this->orderStatus) {
            $order = $orderDetail->order;
            \App\Http\Controllers\Smsir\Facades\Smsir::replaceAdminAndSend($order, $orderDetail, $this->orderStatus);
            \App\Http\Controllers\Smsir\Facades\Smsir::replaceManagerAndSend($order, $orderDetail, $this->orderStatus);


			if($this->orderStatus == 'wc-completed')
			{

				@$send = $this->SmiCardCharge($order->mobile);
				if (@$send === true)
				{
					$textMessage = "سلام دوست من، بابت خریدت ازت ممنونیم، هدیه شارژ هزار تومنی از طرف فارس گیمر مثل یه شکلات تقدیم شما \n Farsgamer.com";
					\App\Http\Controllers\Smsir\Facades\Smsir::send($textMessage, $order->mobile);
				}
			}

			if ($orderDetail->product->type == Product::TYPE_INSTANT_DELIVERY && $this->orderStatus == Order::STATUS_COMPLETED)
			{
				$check = DepotItem::where('product_id',$orderDetail->product->id)->first();
				$price = 0;
				$eneter = Depot::latest('id')->where('action',Depot::ENTER)->whereHas('depotItem',function($q) use ($orderDetail){
					return $q->where('product_id',$orderDetail->product->id);
				})->select('price','count')->get();
				$exit_count = Depot::latest('id')->where('action',Depot::EXIT)->whereHas('depotItem',function($q) use ($orderDetail){
					return $q->where('product_id',$orderDetail->product->id);
				})->sum('count');

				$eneter_count = (int)$eneter->sum('count');
				$diff = $eneter_count - (int)$exit_count;
					

				foreach($eneter as $item) {
					if ($eneter_count - (int)$item->count < $diff) {
						$price = $item->price;
						break;
					} else {
						$eneter_count = $eneter_count - (int)$item->count;
					}
				}
				if (is_null($check)){
					$check = DepotItem::create([
						'product_id' => $orderDetail->product->id,
						'category' => $orderDetail->product->category_id,
						'status' => $orderDetail->product->status,
						'image' => $orderDetail->product->image ?? '',
						'type' => Depot::DIGITAL
					]);
					Depot::create([
						'depot_items_id' => $check->id,
						'count' => $orderDetail->quantity,
						'action' => Depot::EXIT,
						'user_id' => auth()->id(),
						'price' => $price ,
						'category' => $orderDetail->product->category_id ,
						'exit_price' => $orderDetail->product->price,
						'description' => 'ثبت سفارش',
						'image' => $orderDetail->product->image ?? '',
						'track_id' => (int)$orderDetail->order->id + Order::CHANGE_ID,
						'order_detail_id' => $orderDetail->id,
						'type' => Depot::DIGITAL,
						'licenses' => $this->orderSms
					]);
				} else {
					$check_depot = Depot::where('order_detail_id',$orderDetail->id)->whereNull('licenses')->first();
					if (is_null($check_depot)){
						Depot::create([
							'depot_items_id' => $check->id,
							'count' => $orderDetail->quantity,
							'action' => Depot::EXIT,
							'user_id' => auth()->id(),
							'price' => $price ,
							'category' => $orderDetail->product->category_id ,
							'exit_price' => $orderDetail->product->price,
							'description' => 'ثبت سفارش',
							'image' => $orderDetail->product->image ?? '',
							'track_id' => (int)$orderDetail->order->id + Order::CHANGE_ID,
							'order_detail_id' => $orderDetail->id,
							'type' => Depot::DIGITAL,
							'licenses' => $this->orderSms
						]);
					}
				}
			}

			if ($orderDetail->product->type == Product::TYPE_INSTANT_DELIVERY || $orderDetail->product->type == Product::TYPE_NORMAL_DELIVERY) {
				if ($orderDetail->product->buy_amount > 0 && !is_null($orderDetail->product->currency_id)  )
				{
					if ($this->orderStatus == Order::STATUS_COMPLETED)
					{
						CurrencyHistory::create([
							'currency_id' => $orderDetail->product->currency_id,
							'count' => -1*($orderDetail->product->buy_amount * $orderDetail->quantity),
							'user_id' => auth()->id(),
							'amount' => $orderDetail->product->currency->amount,
							'order_id' => $orderDetail->id,
							'product' => $orderDetail->product->title,
							'description' => ' تکمیل سفارش'.' کد سفارش : '.$orderDetail->order->id,
						]);
					} elseif ($status == Order::STATUS_COMPLETED)
					{
						$row = CurrencyHistory::where('order_id',$orderDetail->id)->first();
						if (!is_null($row))
						{
							$row->delete();
						}
					}
				}
			}


			

            if (!is_null($this->orderSms) && $this->orderSms != '') {
                \App\Http\Controllers\Smsir\Facades\Smsir::send($this->orderSms, $order->mobile);



                $sms = Smsir::create([
                    'model_type' => 'order',
                    'model_id' => $this->model->order_id,
                    'mobile' => $this->model->order->mobile,
                    'message' => $this->orderSms,
                ]);

                $note = OrderNote::create([
                    'note' => $this->orderSms,
                    'is_user_note' => 1,
                    'is_read' => 0,
                    'order_id' => $this->model->order_id,
                    'user_id' => auth()->id(),
                ]);

                $this->sms->push($sms);
                $this->notes->push($note);
            }
        }
    }

    public function resetInputs()
    {
        //set field
    }

    public function completeLicenses()
    {
        $product = $this->model->product;

        if ($product->type == Product::TYPE_INSTANT_DELIVERY && $this->model->quantity > sizeof($this->model->licenses)) {
            $licensesCode = $product->licenses()->isNotUsed()->take($this->model->quantity - sizeof($this->model->licenses))->get();
            if (sizeof($licensesCode) == $this->model->quantity - sizeof($this->model->licenses)) {

                $licenses = $this->model->licenses;
                foreach ($licensesCode as $key => $license) {
                    $license->is_used = 1;
                    $license->save();
                    $licenses[] = $license->license;
                }
                $this->model->licenses = $licenses;
                $this->model->save();

                $this->model = OrderDetail::find($this->model->order_id);

                \App\Http\Controllers\Smsir\Facades\Smsir::sendLicensesCode($this->model->order, $this->model);

                $this->emitNotify('لاینسیس با موفقیت ثبت شد');
            } else {
                $this->emitNotify('لاینسیس ها کافی نیست', 'warning');
            }
        }
    }

    public function sendNote()
    {
        $this->validate(
            [
                'sendNote' => ['required', 'string', 'max:9500'],
                'noteType' => ['required', 'boolean'],
            ],
            [],
            [
                'sendNote' => 'یادداشت',
                'noteType' => 'نوع یادداشت',
            ]
        );

        $note = OrderNote::create([
            'note' => $this->sendNote,
            'is_user_note' => $this->noteType,
            'is_read' => 0,
            'order_id' => $this->model->order_id,
            'user_id' => auth()->id(),
        ]);

        $this->notes->push($note);

        $this->reset(['sendNote', 'noteType']);
        $this->emitNotify('یادداشت با موفقیت ثبت شد');
    }

    public function deleteNote($key)
    {
        $note = $this->notes->pull($key);
        OrderNote::findOrFail($note->id)->delete();

        $this->emitNotify('یادداشت با موفقیت حذف شد');
    }

    public function sendSms()
    {
        $this->validate(
            [
                'sendSms' => ['required', 'string', 'max:9500'],
            ],
            [],
            [
                'sendSms' => 'پیامک',
            ]
        );

        \App\Http\Controllers\Smsir\Facades\Smsir::send($this->sendSms, $this->model->order->mobile);

        $sms = Smsir::create([
            'model_type' => 'order',
            'model_id' => $this->model->order_id,
            'mobile' => $this->model->order->mobile,
            'message' => $this->sendSms,
        ]);

        $note = OrderNote::create([
            'note' => $this->sendSms,
            'is_user_note' => 1,
            'is_read' => 0,
            'order_id' => $this->model->order_id,
            'user_id' => auth()->id(),
        ]);

        $this->sms->push($sms);
        $this->notes->push($note);

        $this->reset(['sendNote', 'noteType']);
        $this->emitNotify('پیامک با موفقیت ثبت شد');
    }

    public function deleteOrder($id)
    {
        $this->authorize('delete_orders');

        $detail = OrderDetail::with('order')->findOrFail($id);
        DB::transaction(function () use ($detail) {
            $order = $detail->order;

            $detail->delete();

            if ($order->details()->count() == 0) {
                if ($order->wallet_pay > 0) {
                    $order->user->deposit($order->wallet_pay, ['description' => "بابت لغو سفارش {$order->tracking_code}"]);
                    $order->wallet_pay = 0;
                    $order->save();
                }
                $order->delete();
            }
        });

        return redirect()->route('admin.orders');
    }
	public function copyLicenses($text = null)
	{
		$copy = new Copy();
		$copy->user_id = Auth()->user()->id;
		$copy->product_id = $this->model->product_id;
		$copy->text = $text;
		$copy->save();
	}

	

	public function checkCode($data)
	{
		if(!empty($data) && !empty($this->sendedCode) && $data == $this->sendedCode){
			$this->hash = false;
			$this->emitNotify('هش با موفقیت غیرفعال شد');
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => $this->model->order->id + \App\Models\Order::CHANGE_ID,
				'status' => 'کد ارسال شده صحیح',
				'value' => $data,
			]);
		} else {
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => $this->model->order->id + \App\Models\Order::CHANGE_ID,
				'status' => 'کد ارسال شده اشتباه',
				'value' => $data,
			]);
		}
	}

	public function checkPassword($data)
	{
		$passwords = explode(',',Setting::where('name', 'depot_password')->first()->value);
		if(in_array($data,$passwords) && !empty($data)) {
			$this->sendedCode = rand(123459,9999999);
			$this->emit('verify-code');
			SMS::sendAdminCode($data,$this->sendedCode);
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => $this->model->order->id + \App\Models\Order::CHANGE_ID,
				'status' => 'رمز صحیح',
				'value' => $data,
			]);
		} else {
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => $this->model->order->id + \App\Models\Order::CHANGE_ID,
				'status' => 'رمز اشتباه',
				'value' => $data,
			]);
			$this->emitNotify('گذرواژه وارد شده اشتباه می باشد','warning');
		}
	}

	public function getNumber($number) {
		if ($this->model->status != Order::STATUS_COMPLETED) {
			$response  = Http::accept('application/json')
            ->post('https://container.elfiro.com/api/v1/otp',[
                'phone' => $number,
            ]);

			if ($response->status() == 200) {
				$this->admin_phone = $number;
				$this->emit('verify-request');
			} else {
				$this->emitNotify('شماره همراه اشتباه می باشد','warning');
			}
		}
	}

	public function verifyRequest($code) {
		// if (auth()->id() != 55867) {
		// 	return;
		// }
		$pID= $this->model->product->id;
		$salt = '12$#dAe)O@c$5*2Cn#g/sV^55!wX';
		$md5 = md5($salt.$pID.$salt);
		$orderId = (int)$this->model->id + Order::CHANGE_ID;
		$userID = $this->model->order->user->id;
		$codes = $md5."-".$pID."-".$userID."-".$orderId;
		$response  = Http::accept('application/json')->post('https://container.elfiro.com/api/v1/custom_data',[
			'phone' => $this->model->order->user->mobile,
			'count' => $this->model->quantity,
			'code' => base64_encode($codes),
			'exit_price' => $this->model->price,
			'product_title' => $this->model->product->title,
			'base_id' => (int)$this->model->order->id + Order::CHANGE_ID,
			'admin_phone' => $this->admin_phone,
			'admin_code' => $code
		]);
		
		if ($response->status() == 200) {
			$licenses = explode(',',base64_decode($response->json()['data']['licenses']));
			$this->model->status = Order::STATUS_COMPLETED;
            $this->model->licenses = $licenses;
            $this->model->save();

            SMS::replaceAdminAndSend($this->model->order, $this->model, Order::STATUS_COMPLETED);
			if ($this->model->product->manager_sms == 1)
                SMS::replaceManagerAndSend($this->model->order, $this->model, Order::STATUS_COMPLETED);
            SMS::replaceUserAndSend($this->model->order, $this->model, Order::STATUS_COMPLETED);
			SMS::sendLicensesCodeNew($this->model->order, $this->model);	
			$this->emitNotify('سفارش با موفقیت تکمیل شد');
        } else {
			$this->emitNotify('خطا در هنگام انجام عملیات','warning');
		}
	}
}