<?php

namespace App\Http\Controllers\Site\Carts;

use App\Http\Controllers\Cart\Facades\Cart;
use App\Http\Controllers\FormBuilder\Facades\FormBuilder;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\Product;
use App\Models\User;
use App\Models\PaymentTransaction;
use App\Models\Voucher;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PHPUnit\Exception;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class CartPaymentComponent extends Component
{
    public $name, $family, $email, $mobile, $description, $gateway = 'zarinpal';

	public $province,$city,$postalCode,$address;
	public $addressForm = false;
    public $useWallet = false;
	public $walletAmountShow = false;
    private $walletAmount = 0;

    public $useVoucher = false;
    public $voucherCode;
    private $voucherAmount = 0;
    public $voucherAmountShow = 0;
	public $location;

	public function getLocation()
	{
		try{
			$ipaddress = '';
			if (isset($_SERVER['HTTP_CLIENT_IP'])) {
				$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
			} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
				$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
			} else if (isset($_SERVER['HTTP_FORWARDED'])) {
				$ipaddress = $_SERVER['HTTP_FORWARDED'];
			} else if (isset($_SERVER['REMOTE_ADDR'])) {
				$ipaddress = $_SERVER['REMOTE_ADDR'];
			} else {
				$ipaddress = 'UNKNOWN';
			}
			$PublicIP = $ipaddress;
			$json     = file_get_contents("http://ipinfo.io/$PublicIP/geo");
			$json     = json_decode($json, true);
			$country  = $json['country'];
			return $country;
		} catch(\Exception $e) {
			return "NE";
		}
	}
    public function mount()
    {
        SEOMeta::setTitle('پرداخت - فارس گیمر');
        OpenGraph::setTitle('پرداخت - فارس گیمر');
        TwitterCard::setTitle('پرداخت - فارس گیمر');
        JsonLd::setTitle('پرداخت - فارس گیمر');

		if ( auth()->id() == 55867 ) {
			// dd($this->getLocation());
		}

		
		$this->checkProducts();
        $user = auth()->user();
        $this->name = $user->name;
        $this->family = $user->family;
        $this->mobile = $user->mobile;
        $this->email = $user->email;
		// $this->location = $this->getLocation();
		// dd(Cart::content());
        if (sizeof(Cart::content()) == 0) {
            return redirect()->route('home');
        }
    }

	public function checkProducts()
	{
		$productCats = [];
		$cart = false;
		foreach (Cart::content() as $item) {
			$product = Product::where('id',$item->id)->first();
			if ($product->type == Product::TYPE_CARD)
				$cart = true;

			$productCats[] = $product->Category->parent_id;
		}
			
		if (in_array(12,@$productCats) || $cart) {
			$this->addressForm = true;		
		}
	}

    public function updatedUseWallet()
    {
        $this->calculatePrice();
    }

    public function render()
    {
		$this->voucherAmountShow = $this->voucherAmount;
		$this->walletAmountShow = $this->walletAmount;
        return view('site.carts.cart-payment-component')
            ->extends('site.layouts.site');
    }

    public function payment()
    {
		$this->calculatePrice();
		$this->checkVoucherCode();
        $this->description = ($this->description == '') ? null : $this->description;

        if (sizeof(Cart::content()) == 0) {
            return redirect()->route('home');
        }

		if ($this->addressForm === true)
		{
			$this->validate(
            [
                'name' => ['required', 'string', 'max:250'],
                'family' => ['required', 'string', 'max:250'],
                'mobile' => ['required', 'string', 'size:11'],
                'email' => ['required', 'email', 'max:250'],
                'description' => ['nullable', 'string', 'max:16500'],
                'gateway' => ['required', 'in:payir,zarinpal'],
                'useWallet' => ['required', 'boolean'],
				'province' => ['required', 'max:250' , 'string'],
				'city' => ['required', 'max:250' , 'string'],
				'postalCode' => ['required', 'size:10'],
				'address' => ['required', 'string'],
            ],
            [],
            [
                'name' => 'نام',
                'family' => 'نام خانوادگی',
                'mobile' => 'موبایل',
                'email' => 'ایمیل',
                'description' => 'توضیحات',
                'gateway' => 'درگاه',
                'useWallet' => 'کیف پول',
				'province' => 'استان',
				'city' => 'شهر',
				'postalCode' => 'کد پستی',
				'address' => 'ادرس'
            ]
        );	
		} else {
			$this->validate(
            [
                'name' => ['required', 'string', 'max:250'],
                'family' => ['required', 'string', 'max:250'],
                'mobile' => ['required', 'string', 'size:11'],
                'email' => ['required', 'email', 'max:250'],
                'description' => ['nullable', 'string', 'max:16500'],
                'gateway' => ['required', 'in:payir,zarinpal'],
                'useWallet' => ['required', 'boolean'],
            ],
            [],
            [
                'name' => 'نام',
                'family' => 'نام خانوادگی',
                'mobile' => 'موبایل',
                'email' => 'ایمیل',
                'description' => 'توضیحات',
                'gateway' => 'درگاه',
                'useWallet' => 'کیف پول',
            ]
        );
		}
        if ($this->useVoucher && ! Voucher::where('code', $this->voucherCode)->exists()){
            $this->addError('voucher', 'کد وارد شده معتبر نیست');
            $this->useVoucher = false;
            $this->voucherCode = null;
            return;
        }

		if ( $this->getLocation() != "IR" ) {
			return $this->addError('gateway', 'کاربر گرامی لطفا قبل از پرداخت از قطع بودن اتصال vpn خود اطمینان حاصل فرمایید.');
		}


		// if ($this->getLocation() != "IR") {

		// 	return;
		// }

        $timer = 0;
        foreach (Cart::content() as $key => $item) {
            $timer = max($item->delivery_time, $timer);
        }


		if (
			(Cart::total(0, 0) >= 1000000 && !in_array(auth()->user()->auth_status,[User::USER_OK,User::USER_DO_NOT_NEED_AUTH])) ||
			in_array(auth()->user()->auth_status,[User::UESR_PENDING,User::USER_REJECT_AUTH])
		 )  {
			return $this->addError('gateway', '
			با سلام، مشتری گرامی به منظور حفظ امنیت پرداخت و دستور پلیس فتا، لطفا جهت ادامه فرایند احراز هویت خود را طبق نمونه کامل فرمایید تا خریدی امن را تجربه کنید. از 
			اینکه فارس گیمر را انتخاب کرده اید مچکریم
			
			<br>
			<a class="text-primary" href="'.route('dashboard.profile').'">لینک احراز هویت</a>
			');
		}

        if (Cart::total($this->walletAmount, $this->voucherAmount) == 0) {
            $orderId = $this->store($timer);

            return redirect(route('cart.checkout', ['tracking' => $orderId + Order::CHANGE_ID]));
        }

		
		

			try {
				$payment = Payment::via($this->gateway)->config([
					'mechandId' => config('payment.drivers.zarinpal.merchantId'),
					'description' => "order-".auth()->user()->mobile,
					// 'mode' => auth()->id() == '55867' ? 'sandbox' : 'normal'
				])->callbackUrl(env('APP_URL') . '/cart/checkout/' . $this->gateway)
					->purchase((new Invoice)
						->amount(Cart::total((int)$this->walletAmount, (int)$this->voucherAmount))->detail('detailName','your detail goes here'), function ($driver, $transactionId) use ($timer) {

						$this->store($timer, $this->gateway, $transactionId);
					})->pay()->toJson();

				$payment = json_decode($payment);
				return redirect($payment->action);
			} catch (PurchaseFailedException $exception){
				$this->addError('gateway', $exception->getMessage());
			}

    }

    private function calculatePrice()
    {
        $this->walletAmount = 0;
        if ($this->useWallet) {
            $user = auth()->user();

            $balance = $user->balance;
            if ($balance > 0){
                if ($balance >= Cart::total(0, $this->voucherAmount)) {
                    $balance = Cart::total(0, $this->voucherAmount);
                }

                $this->walletAmount = $balance;
            }
        }
    }

    private function store($timer, $gateway = null, $transactionId = null)
    {
        $id = DB::transaction(function () use ($timer, $gateway, $transactionId) {

            $voucherId = null;
            $voucherAmount = 0;
            if ($this->useVoucher){
                $voucherId = Voucher::where('code', $this->voucherCode)->first()->id;
                $voucherAmount = $this->voucherAmount;
            }

            $order = Order::create([
                'name' => $this->name,
                'family' => $this->family,
                'mobile' => $this->mobile,
                'email' => $this->email,
                'description' => $this->description,
				'province' =>  $this->province,
				'city' => $this->city,
				'postalCode' => $this->postalCode,
				'address' => $this->address,
                'price' => Cart::price(),
                'discount' => Cart::discount(),
                'voucher_id' => $voucherId,
                'voucher_amount' => $voucherAmount,
                'wallet_pay' => $this->walletAmount,
                'total_price' => Cart::total($this->walletAmount, $voucherAmount),
                'delivery_time' => Carbon::make(now())->addHours($timer),

                'user_id' => auth()->id(),
                'user_ip' => request()->ip(),
            ]);

            if (!is_null($gateway)) {
                PaymentTransaction::create([
                    'amount' => Cart::total($this->walletAmount, $voucherAmount),
                    'payment_gateway' => $gateway,
                    'payment_token' => $transactionId,
                    'model_type' => 'order',
                    'model_id' => $order->id,
                    'user_id' => auth()->id(),
					
                ]);
            }

            if ($this->useWallet && $this->walletAmount > 0) {
                auth()->user()->withdraw($this->walletAmount, ['description' => 'بابت سفارش ' . $order->tracking_code]);
            }

            foreach (Cart::content() as $key => $item) {
                OrderDetail::create([
                    'product_id' => $key,
                    'product_data' => json_encode(['id' => $item->id, 'title' => $item->title]),
                    'price' => ($item->price + FormBuilder::formPrice($item->form)) * $item->quantity,
                    'status' => Order::STATUS_NOT_PAID,
                    'quantity' => $item->quantity,
                    'form' => json_encode($item->form),
                    'licenses' => [],
                    'order_id' => $order->id,
					'file' => $item->file
                ]);

				if(!empty($item->file)) {
					auth()->user()->update([
						'file' => $item->file
					]);
				}
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

    public function checkVoucherCode()
    {
        $this->useVoucher = false;
        $this->voucherAmount = 0;
        $voucher = Voucher::where('code', $this->voucherCode);


		if (!empty($voucher->first()->expires_at))
		{
			$origin = date_create($voucher->first()->expires_at);
			$target = date_create(date('Y-m-d'));
			$interval = date_diff($target,$origin);
			if ((int)$interval->format("%r%a") < 0)
			{
				$this->addError('voucher', 'کد وارد شده  منقضی شده است');
				$this->calculatePrice();
				$this->voucherCode = null;
				return;
			}
		}
		

        //exists
        if (!$voucher->exists()){
            $this->addError('voucher', 'کد وارد شده معتبر نیست');
            $this->calculatePrice();
            $this->voucherCode = null;
            return;
        }

		

        $voucher = $voucher->first();
        $meta = $voucher->meta;

        if ($meta->contains('name', 'minimum_amount')){
            if (Cart::price() < $meta->where('name', 'minimum_amount')->first()->value){
            $this->addError('voucher', 'مبلغ سفارش کمتر از حد مجاز است');
            $this->calculatePrice();
                $this->voucherCode = null;
            return;
            }
        }

        if ($meta->contains('name', 'maximum_amount')){
            if (Cart::price() > $meta->where('name', 'maximum_amount')->first()->value) {
                $this->addError('voucher', 'مبلغ سفارش بیشتر از حد مجاز است');
                $this->calculatePrice();
                $this->voucherCode = null;
                return;
            }
        }

        if ($meta->contains('name', 'product_ids')){
            foreach (Cart::content() as $item){
                if (!str_contains($meta->where('name', 'product_ids')->first()->value, $item->id)){
                    $this->addError('voucher', 'امکان استفاده روی این محصولات وجود ندارد');
                    $this->calculatePrice();
                    $this->voucherCode = null;
                    return;
                }
            }
        }

        if ($meta->contains('name', 'exclude_product_ids')){
            foreach (Cart::content() as $item){
                if (str_contains($meta->where('name', 'exclude_product_ids')->first()->value, $item->id)){
                    $this->addError('voucher', 'امکان استفاده روی ابن محصولات وجود ندارد');
                    $this->calculatePrice();
                    $this->voucherCode = null;
                    return;
                }
            }
        }

        if ($meta->contains('name', 'exclude_sale_items')){
            foreach (Cart::content() as $item){
                if ($item->discount > 0){
                    $this->addError('voucher', 'امکان استفاده روی محصول دارای تخفیف وجود ندارد');
                    $this->calculatePrice();
                    $this->voucherCode = null;
                    return;
                }
            }
        }

        if ($meta->contains('name', 'category_ids')){
            foreach (Cart::content() as $item){
                $product = Product::find($item->id);
                $category = Category::find($product->category_id);
                $parentCategory = $category->parent;
                foreach (explode(',', $meta->where('name', 'category_ids')->first()->value) as $cat){
                    if ((int) $cat != $category->id || (int) $cat != $parentCategory->id){
                        $this->addError('voucher', 'امکان استفاده روی ابن محصولات وجود ندارد');
                        $this->calculatePrice();
                        $this->voucherCode = null;
                        return;
                    }
                }
            }
        }

        if ($meta->contains('name', 'exclude_category_ids')){
            foreach (Cart::content() as $item){
                $product = Product::find($item->id);
                $category = Category::find($product->category_id);
                $parentCategory = $category->parent;
                foreach (explode(',', $meta->where('name', 'exclude_category_ids')->first()->value) as $cat){
                    if ((int) $cat = $category->id || (int) $cat == $parentCategory->id){
                        $this->addError('voucher', 'امکان استفاده روی ابن محصولات وجود ندارد');
                        $this->calculatePrice();
                        $this->voucherCode = null;
                        return;
                    }
                }
            }
        }

        if ($meta->contains('name', 'usage_limit')){
            $count = Order::where('voucher_id', $voucher->id)->count();
            if ($count >= (int) $meta->where('name', 'usage_limit')->first()->value){
            $this->addError('voucher', 'امکان استفاده از کد وجود ندارد');
            $this->calculatePrice();
                $this->voucherCode = null;
            return;
            }
        }

        if ($meta->contains('name', 'usage_limit_per_user')){
            $count = Order::where('voucher_id', $voucher->id)
                ->where('user_id', auth()->id())
                ->count();
            if ($count >= (int) $meta->where('name', 'usage_limit_per_user')->first()->value){
                $this->addError('voucher', 'شما قبلا به میزان مجاز از این کد استفاده کرده اید');
                $this->calculatePrice();
                $this->voucherCode = null;
                return;
            }
        }
		if ($meta->contains('name', 'value_limit')){
			if ($voucher->type == Voucher::TYPE_PERCENT){
				if ( ((Cart::total() * $voucher->amount) / 100) > $meta->where('name', 'value_limit')->first()->value) {
					$this->useVoucher = true;

        			$this->voucherAmount = $voucher->amount;

					$this->voucherAmount = $meta->where('name', 'value_limit')->first()->value;
					
					$this->calculatePrice();
					
					return;
				}
			}
		}
		 

        $this->useVoucher = true;

        $this->voucherAmount = $voucher->amount;
        if ($voucher->type == Voucher::TYPE_PERCENT){
            $this->voucherAmount = (Cart::total() * $voucher->amount) / 100;
        }

        $this->calculatePrice();
    }
}
