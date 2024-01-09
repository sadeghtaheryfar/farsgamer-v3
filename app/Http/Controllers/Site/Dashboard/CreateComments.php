<?php

namespace App\Http\Controllers\Site\Dashboard;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use App\Models\Order;

class CreateComments extends Component
{
    public $orderId, $product_id,
        $model;

    public function mount($orderId, $productId)
    {
        $this->orderId = $orderId;
        $this->product_id = $productId;

        $this->model['rating'] = 1;
    }

    public function render()
    {
        return view('site.dashboard.create-comments')
            ->extends('site.layouts.dashboard');
    }

    public function rules()
    {
        return [
            'model.comment' => 'required|string|max:250',
            'model.rating' => 'required|integer|min:1|max:5'
        ];
    }

    public function setRating($rating)
    {
        $this->model['rating'] = $rating;
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
			$result = curl_exec($ch);
			$status = json_decode($result);
			if ($status->code == 1)
				return true;
		}
		return false;
	}

    public function store()
    {
        $this->validate();
		if (Order::findOrFail($this->orderId)->partner_id == 0) {
			$user = auth()->user();
			if ($user->comments()->where('order_id', $this->orderId)->where('commentable_type', 'product')
				->where('commentable_id', $this->product_id)->exists()) {
				session()->flash('error', 'نظر شما قبلا ثبت شده');
				return;
			}

			$rateKey = 'comment-attempt:' . $this->orderId . '|' . $this->product_id;
			if (RateLimiter::tooManyAttempts($rateKey, 1)) {
				return $this->addError('error', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
			}
			RateLimiter::hit($rateKey, 6 * 60 * 60);
			DB::transaction(function () use ($user) {
				$user->comments()->create([
					'comment' => $this->model['comment'],
					'rating' => $this->model['rating'],
					'order_id' => $this->orderId,
					'commentable_type' => 'product',
					'commentable_id' => $this->product_id,
				]);
				$orders = Order::find($this->orderId);
				$order_time = $orders->created_at->toArray();
				$origin = date_create($orders->created_at);
				$target = date_create(date('Y-m-d H:i:s'));
				$interval = date_diff($origin, $target);
				$m = $interval->format('%i');
				if ((int)$m < 30  && date("d") == $order_time['day'] && date("m") == $order_time['month'] && date("Y") == $order_time['year'] ) {
					// auth()->user()->deposit(1000, ['description' => 'بابت ثبت نظر']);	
					if (auth()->user()->mobile)
					{
						$send = $this->SmiCardCharge(auth()->user()->mobile);
						if ($send === true)
						{
							$textMessage = "سلام دوست من، بابت ثبت نظر ازت ممنونیم، هدیه شارژ هزار تومنی از طرف فارس گیمر مثل یه شکلات تقدیم شما \n Farsgamer.com";
							\App\Http\Controllers\Smsir\Facades\Smsir::send($textMessage, auth()->user()->mobile);
						}
					}
				}
			});

			session()->flash('success', 'نظر شما با موفقیت ثبت شد');
		}
        
    }
}
