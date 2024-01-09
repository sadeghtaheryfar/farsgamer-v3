<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\User;
use App\Http\Controllers\Smsir\Facades\Smsir;
use App\Http\Resources\User as UserResource;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\PaymentTransaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Illuminate\Support\Facades\Auth;

class BotApi extends Controller
{
	public $cart , $order;

	public function otp(Request $request)
	{
		$validator = Validator::make($request->all(),[
            'number' => ['required','exists:users,mobile'],
        ],[],[
            'number' => 'شماره همراه',
        ]);

		if ($validator->fails()){
            return response([
                'data' =>  [
                    'message' => $validator->errors()
                ],
                'status' => 'error'
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
		$number = $request->number;
		$rateKey = 'register-attempt:' .$number. '|' . request()->ip();
        if (RateLimiter::tooManyAttempts($rateKey, 25)) {
             return response([
               'data' => [
                    'message' => [
                        'number' => ['زیادی تلاش کردی لطفا پس از مدتی دوباره سعی کنید.']
                    ]
                ],
                'status' => 'error'
            ],Response::HTTP_TOO_MANY_REQUESTS);
        }

        RateLimiter::hit($rateKey, 2 * 60 * 60);

		$otp = mt_rand(1234,9999);
		
		$user = User::where('mobile', $number)->first();
		$user['otp'] = $otp;
		$user->save();
		Smsir::sendVerification($number, $otp);
		return response([
            'data' => [],
            'status' => 'success'
        ],Response::HTTP_OK);
	}

	public function validateOtp(Request $request)
	{
		$validator = Validator::make($request->all(),[
            'code' => ['required','integer'],
			'number' => ['required','exists:users,mobile'],
        ],[],[
			'number' => 'شماره همراه',
            'code' => 'کد تایید',
        ]);
		if ($validator->fails()){
            return response([
                'data' =>  [
                    'message' => $validator->errors()
                ],
                'status' => 'error'
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
		$number = $request->number;
		$rateKey = 'register-attempt-otp:' .$number. '|' . request()->ip();
        if (RateLimiter::tooManyAttempts($rateKey, 25)) {
             return response([
               'data' => [
                    'message' => [
                        'code' => ['زیادی تلاش کردی لطفا پس از مدتی دوباره سعی کنید.']
                    ]
                ],
                'status' => 'error'
            ],Response::HTTP_TOO_MANY_REQUESTS);
        }

        RateLimiter::hit($rateKey, 2 * 60 * 60);

		$user = User::where('mobile', $number)->first();

		if (\Hash::check($request->code, $user->otp)) {
			return response([
				'data' => [
					'user' => new UserResource($user),
				],'status' => 'success'
			],Response::HTTP_OK);
		} else {
			 return response([
                'data' =>  [
                    'message' => [
						'code' => ['کد وارد شده معتبر نمی باشد']
					]
                ],
                'status' => 'error'
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
		}

	}

	public function validateReduction(Request $request)
	{
		$validator = Validator::make($request->all(),[
            'code' => ['required','exists:vouchers,code'],
			'cart' => ['required','json'],
			'number' => ['required','exists:users,mobile'],
        ],[],[
            'code' => 'کد تخفیف',
			'cart' => 'سبد خرید',
			'number' => 'شماره همراه',
        ]);

		$cart = collect(json_decode($request['cart'],true));
		$user = User::where('mobile',$request->number)->first();

		$total = $cart->reduce(function ($carry, $value, $key) {
			return $carry + ($value['total_price']) * $value['quantity'];
		});

		if ($validator->fails()){
            return response([
                'data' =>  [
                    'message' => $validator->errors()
                ],
                'status' => 'error'
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }

		$useVoucher = false;
        $voucherAmount = 0;
        $voucher = Voucher::where('code', $request->code);

		if (!empty($voucher->first()->expires_at))
		{
			$origin = date_create($voucher->first()->expires_at);
			$target = date_create(date('Y-m-d'));
			$interval = date_diff($target,$origin);
			if ((int)$interval->format("%r%a") < 0)
			{
				return $this->invalidCode('کد وارد شده  منقضی شده است',$voucherAmount);
			}
		}

		$voucher = $voucher->first();
        $meta = $voucher->meta;

		if ($meta->contains('name', 'minimum_amount')){
            if ($total < $meta->where('name', 'minimum_amount')->first()->value){
				return $this->invalidCode('مبلغ سفارش کمتر از حد مجاز است',$voucherAmount);
            }
        }

		if ($meta->contains('name', 'maximum_amount')){
            if ($total > $meta->where('name', 'maximum_amount')->first()->value){
				return $this->invalidCode( 'مبلغ سفارش بیشتر از حد مجاز است',$voucherAmount);
            }
        }

		if ($meta->contains('name', 'product_ids')){
            foreach ($cart as $item){
                if (!str_contains($meta->where('name', 'product_ids')->first()->value, $item->product_id)){
                    return $this->invalidCode( 'امکان استفاده روی این محصولات وجود ندارد',$voucherAmount);
                }
            }
        }


		if ($meta->contains('name', 'exclude_product_ids')){
            foreach ($cart as $item){
                if (str_contains($meta->where('name', 'exclude_product_ids')->first()->value, $item->product_id)){
                    return $this->invalidCode( 'امکان استفاده روی این محصولات وجود ندارد',$voucherAmount);
                }
            }
        }

		if ($meta->contains('name', 'exclude_sale_items')){
            foreach ($cart as $item){
                if ($item['reduction_amount'] > 0){
                    return $this->invalidCode( 'امکان استفاده روی محصول دارای تخفیف وجود ندارد',$voucherAmount);
                }
            }
        }

		if ($meta->contains('name', 'category_ids')){
            foreach ($cart as $item){
                $product = Product::find($item->product_id);
                $category = Category::find($product->category_id);
                $parentCategory = $category->parent;
                foreach (explode(',', $meta->where('name', 'category_ids')->first()->value) as $cat){
                    if ((int) $cat != $category->id || (int) $cat != $parentCategory->id){
						return $this->invalidCode( 'امکان استفاده روی ابن محصولات وجود ندارد',$voucherAmount);
                    }
                }
            }
        }

		if ($meta->contains('name', 'exclude_category_ids')){
            foreach ($cart as $item){
                $product = Product::find($item->product_id);
                $category = Category::find($product->category_id);
                $parentCategory = $category->parent;
                foreach (explode(',', $meta->where('name', 'exclude_category_ids')->first()->value) as $cat){
                    if ((int) $cat == $category->id || (int) $cat == $parentCategory->id){
						return $this->invalidCode( 'امکان استفاده روی ابن محصولات وجود ندارد',$voucherAmount);
                    }
                }
            }
        }

		if ($meta->contains('name', 'usage_limit')){
            $count = Order::where('voucher_id', $voucher->id)->count();
            if ($count >= (int) $meta->where('name', 'usage_limit')->first()->value){
				return $this->invalidCode('امکان استفاده از کد وجود ندارد',$voucherAmount);
            }
        }

		if ($meta->contains('name', 'usage_limit_per_user')){
            $count = Order::where('voucher_id', $voucher->id)
                ->where('user_id', $user->id)
                ->count();
            if ($count >= (int) $meta->where('name', 'usage_limit_per_user')->first()->value){
                return $this->invalidCode('شما قبلا به میزان مجاز از این کد استفاده کرده اید',$voucherAmount);
            }
        }

		if ($meta->contains('name', 'value_limit')){
			if ($voucher->type == Voucher::TYPE_PERCENT){
				if ( (($total * $voucher->amount) / 100) > $meta->where('name', 'value_limit')->first()->value) {

					$voucherAmount = $meta->where('name', 'value_limit')->first()->value;
					
					return response([
						'data' =>  [
							'price' => [
								'voucherAmount' => $voucherAmount,
								'total' => $total - $voucherAmount
							]
						],'status' => 'success'
					],Response::HTTP_OK);
					
				}
			}
		}

		$voucherAmount = $voucher->amount;
        if ($voucher->type == Voucher::TYPE_PERCENT){
            $voucherAmount = ($total * $voucher->amount) / 100;
        }

		return response([
			'data' =>  [
				'price' => [
					'voucherAmount' => $voucherAmount,
					'total' => $total - $voucherAmount
				]
			],'status' => 'success'
		],Response::HTTP_OK);
	}


	private function invalidCode($message , $voucherAmount)
	{
		return response([
			'data' =>  [
				'message' => [
					'code' => [$message]
				],
				'price' => [
					'voucherAmount' => $voucherAmount
				]
			],'status' => 'error'
        ],Response::HTTP_NOT_FOUND);
	}

	
	public function startPayment(Request $request)
	{
		$validator = Validator::make($request->all(),[
			'data' => ['required','json'],
        ],[],[
			'data' => 'اطلاعات',
        ]);
		if ($validator->fails()){
            return response([
                'data' =>  [
                    'message' => $validator->errors()
                ],
                'status' => 'error'
            ],Response::HTTP_UNPROCESSABLE_ENTITY);
        }
		$data = json_decode($request['data'],true);
		$this->order = collect($data['order']);
		$this->cart = collect($data['cart']);
		$url = '';
		$timer = 0;
        foreach ($this->cart as $key => $item) {
			$product_time = Product::find($item['product_id'])->delivery_time;
            $timer = max($product_time, $timer);
        }
		$total = $this->order['total_price'];

        if ($total == 0) {
            $orderId = $this->store($total,$timer);
			$url = env('APP_URL') . '/ApiCheckout?tracking='.($orderId + Order::CHANGE_ID);
			return response([
                'data' =>  [
                    'url' => $url
                ],
                'status' => 'success'
            ],Response::HTTP_OK);
        } else {
			try {
				$payment = Payment::via('zarinpal')->config([
					'mechandId' => config('payment.drivers.zarinpal.merchantId'),
					'description' => "order-".$this->order['number'],
					// 'mode' => auth()->id() == '55867' ? 'sandbox' : 'normal',
					'mode' => $this->order['number'] == '09336332901' ? 'sandbox' : 'normal'
				])->callbackUrl(env('APP_URL') . '/ApiCheckout/zarinpal')
					->purchase((new Invoice)
						->amount((int)$total)->detail('detailName','your detail goes here'), function ($driver, $transactionId) use ($timer ,$total ) {
						$this->store($total,$timer, 'zarinpal', $transactionId);
					})->pay()->toJson();

				$payment = json_decode($payment);
				$url = $payment->action;
			} catch (PurchaseFailedException $exception){
				$this->addError('gateway', $exception->getMessage());
			}
			return response([
                'data' =>  [
                    'url' => $url
                ],
                'status' => 'success'
            ],Response::HTTP_OK);
		}

		

		
	}

	private function store($total,$timer, $gateway = null, $transactionId = null)
    {
		$price = $this->cart->reduce(function ($carry, $value, $key) {
			return $carry + ($value['price']) * $value['quantity'];
		});
        $id = DB::transaction(function () use ($timer, $gateway, $transactionId,$price,$total) {

            $voucherId = null;
            $voucherAmount = 0;
            if (!is_null($this->order['reduction_code'])){
				if (Voucher::where('code', $this->order['reduction_code'])->exists()) {
					$voucherId = Voucher::where('code', $this->order['reduction_code'])->first()->id;
               		$voucherAmount = $this->order['code_reduction_amount'];
				}
                
            }
			$discount = $this->order['reduction_value'] - $voucherAmount;
			$user = User::where('mobile',$this->order['number'])->first();
            $order = Order::create([
                'name' => $user->name ?? 'بدون نام',
                'family' => $user->family ?? 'بدون نام',
                'mobile' => $this->order['number'],
                'email' => $this->order['email'],
                'description' => 'telegramBot',
				'province' =>  $this->order['province'],
				'city' => $this->order['city'],
				'postalCode' => $this->order['postalCode'],
				'address' => $this->order['address'],
                'price' => $price,
                'discount' => $discount,
                'voucher_id' => $voucherId,
                'voucher_amount' => $voucherAmount,
                'wallet_pay' => 0,
                'total_price' => $total,
                'delivery_time' => Carbon::make(now())->addHours($timer),

                'user_id' => $user->id,
                'user_ip' => request()->ip(),
            ]);

            if (!is_null($gateway)) {
                PaymentTransaction::create([
                    'amount' => $total,
                    'payment_gateway' => $gateway,
                    'payment_token' => $transactionId,
                    'model_type' => 'order',
                    'model_id' => $order->id,
                    'user_id' => $user->id,
                ]);
            }
            foreach ($this->cart as $key => $item) {
				$product = Product::find($item['product_id']);
                OrderDetail::create([
                    'product_id' => $item['product_id'],
                    'product_data' => json_encode(['id' => $product->id, 'title' => $product->title]),
                    'price' => ($item['price']) * $item['quantity'],
                    'status' => Order::STATUS_NOT_PAID,
                    'quantity' => $item['quantity'],
                    'form' => $item['forms'] ?? json_encode([]),
                    'licenses' => [],
                    'order_id' => $order->id,
                ]);
            }

            OrderNote::create([
                'note' => 'سفارش '.$order->tracking_code.' باموفقیت ثبت شد',
                'is_user_note' => 1,
                'is_read' => 0,
                'order_id' => $order->id,
            ]);

            return $order->id ?? 0;
        });

        return $id;
    }

	public function startVerify(Request $request , $gateway = null)
	{
		if ($request->hasAny(['Authority', 'Status', 'tracking'])) {
			if ($gateway == 'zarinpal' && $request->has(['Authority', 'Status'])) {
				$transaction = PaymentTransaction::where('payment_gateway', 'zarinpal')
                ->where('payment_token', $request->Authority)
                ->where('model_type', 'order')
                ->firstOrFail();

				$url = route('cart.checkout', ['gateway'=>$gateway,'Authority' => $request->Authority, 'Status' => $request->Status]);	
				Auth::loginUsingId($transaction->user_id);
				return redirect($url);
		} elseif (is_null($gateway) && $request->has('tracking')) {
				$order = Order::with('details.product')
					->where('total_price', 0)
					->where('id', $request->tracking - Order::CHANGE_ID)->firstOrFail();
				$url = route('cart.checkout', ['tracking' => $request->tracking]);	
				Auth::loginUsingId($order->user_id);
				return redirect($url);
			}
		}
	}
}