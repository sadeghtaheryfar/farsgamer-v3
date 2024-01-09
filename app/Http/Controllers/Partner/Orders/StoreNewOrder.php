<?php

namespace App\Http\Controllers\Partner\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Cart\Facades\Cart;
use App\Http\Controllers\FormBuilder\Facades\FormBuilder;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\Product;
use App\Models\PaymentTransaction;
use App\Models\Setting;
use App\Models\CategoryParameter;
use App\Models\CategoryParameterProduct;
use Illuminate\Support\Facades\DB;
use PHPUnit\Exception;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Illuminate\Support\Carbon;

class StoreNewOrder extends BaseComponent
{
	 public $name, $family, $email, $mobile, $description, $gateway = 'zarinpal';
	 public $province,$city,$postalCode,$address;
	public $addressForm = false;
    public $useWallet = false;
    public $walletAmount = 0;

    public $useVoucher = false;
    public $voucherCode;
    public $voucherAmount = 0;
	public $location;

    public $readyToLoad = false;
    public $isLoaded = false;

    public $product;
    public $form, $price, $priceWithDiscount;
    public $avg , $start_lottery  ;
    public $quantity = 1;
    public $questionsCount = 0, $commentsCount = 5 ;
    public $prePageComment = 15, $prePageQuestion = 15;

    public $relatedProducts;
    public $banners , $detail_display;
	public $parameters = [],$parametersValue = [];


	public function mount($id)
	{
		$this->setMode(self::MODE_CREATE);
		$this->product = Product::where('status', '!=', Product::STATUS_DRAFT)->findOrFail($id);


		$product_parameters = $this->product->parameter()->get();
		$parameters =  CategoryParameter::where('category_id',$this->product->category_id)->get();
		foreach($parameters as $key => $parameter)
		{
			foreach ($product_parameters as $key2 => $product_parameter)
			{
				$atrValue = CategoryParameterProduct::where('product_id',$this->product->id)->where('parameter_id',$parameter->id)->firstOrFail()->value;
				if ($product_parameter->id == $parameter->id && !empty($atrValue))
				{
					$this->parametersValue[$parameter->id] = $atrValue;
					$this->parameters[$parameter->id] = $parameter;
				} 
			}
		}

		$this->form = $this->product->form;
        $this->price = $this->product->partner_price;
		
        $this->priceWithDiscount = $this->product->partner_price_with_discount;
		$this->detail_display = $this->product->detail_display;
        $this->avg = $this->product->comments()->isConfirmed()->avg('rating');
        $this->questionsCount = $this->product->questions()->isConfirmed()->count();

        $category = Category::find($this->product->category_id);

        if ($category->parent_id) {
            $category = $category->parent->subCategories()->pluck('id');
        } else {
            $category = $category->subCategories()->pluck('id');
        }
		
		$this->checkProducts();
        $user = auth()->user();
        $this->name = $user->name;
        $this->family = $user->family;
        $this->mobile = $user->mobile;
        $this->email = $user->email;
	}

	public function checkProducts()
	{
		$productCats = $this->product->Category->parent_id;
			
		if ($productCats == 12) {
			$this->addressForm = true;		
		}
		
	}

	public function updatedUseWallet()
    {
        $this->calculateFinalPrice();
    }

	private function calculateFinalPrice()
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

	public function payment()
    {
		$this->calculateFinalPrice();
        $this->description = ($this->description == '') ? null : $this->description;
		

        $timer = 0;
        foreach (Cart::content() as $key => $item) {
            $timer = max($item->delivery_time, $timer);
        }

		
        if (Cart::total($this->walletAmount, $this->voucherAmount) == 0) {
            $orderId = $this->store($timer);
            return redirect(route('cart.checkout', ['tracking' => $orderId + Order::CHANGE_ID]));
        }
		
		
			try {
				$payment = Payment::via($this->gateway)->config([
					'mechandId' => config('payment.drivers.zarinpal.merchantId'),
					'description' => "partner-order-".auth()->user()->mobile,
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
				'partner_id' => auth()->id()
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

	public function updatedQuantity()
    {
        $this->validate(['quantity' => ['required', 'integer', 'min:1', 'max:100']]);
        $this->calculatePrice();
    }

    public function updatedForm()
    {
        $this->validate(['quantity' => ['required', 'integer', 'min:1', 'max:100']]);
        $this->calculatePrice();
    }

    public function render()
    {
		if ($this->readyToLoad && !$this->isLoaded) {
            $products = [];
            foreach ($this->form as $item) {
                foreach ($item['options'] as $optionKey => $option) {
                    if (isset($option['license']) && $option['license'] != '') {
                        $products[] = $option['license'];
                    }
                }
            }

            $productsID = Product::whereIn('slug', $products)->get()->pluck('id')->toArray();
            $comments = Comment::where('commentable_type', 'product')
                ->with('user')
                ->whereIn('commentable_id', array_merge($productsID, [$this->product->id]))
                ->isConfirmed()
                ->orderBy('created_at', 'DESC')
                ->paginate($this->prePageComment)->setPageName('comments');

            $this->commentsCount = Comment::where('commentable_type', 'product')
                ->with('user')
                ->whereIn('commentable_id', array_merge($products, [$this->product->id]))
                ->isConfirmed()->count();

            $questions = $this->product->questions()->isConfirmed()->whereNull('parent_id')->orderBy('created_at', 'DESC')
                ->paginate($this->prePageQuestion)->setPageName('questions');

            $this->isLoaded = true;
        }
        return view('partner.orders.store-new-order')->extends('admin.layouts.admin');
    }

	private function calculatePrice()
    {
        foreach ($this->form as $key => $item) {
            foreach ($item['options'] as $optionKey => $option) {
                if ($option['value'] == $item['value'] && isset($option['license']) && $option['license'] != '') {
                    $product = Product::where('slug', $option['license'])->first();
                    $this->form[$key]['options'][$optionKey]['price'] = $product->price - $product->discount_amount;
                }
            }
        }
        $form = collect($this->form);
        $formPrice = $form->reduce(function ($total, $item) {

            $formItem = $item;
            $selectedValue = $item['value'];
            $options = collect($item['options'] ?? []);
            $optionPrice = $options->reduce(function ($total, $item) use ($selectedValue, $formItem) {
                $price = 0;
                if (FormBuilder::isVisible($this->form, $formItem) && $item['value'] == $selectedValue) {
					if ($this->product->const_price)
						@$price = $total + $item['price'];
					else
                    	@$price = $total + $item['price'] * ($this->product->currency->amount ?? 1);

                    if (isset($option['license']) && $option['license'] != '') {
                        $product = Product::where('slug', $option['license'])->first();
                        $price = $product->price - $product->discount_amount;
                    }
                }

                return $total + $price;
            }, 0);

            return $total + $optionPrice;
        }, 0);

        $this->price = round(($this->product->partner_price_with_discount + $formPrice) * $this->quantity) ;
        $this->priceWithDiscount = round(($this->product->partner_price_with_discount + $formPrice) * $this->quantity);
    }

    public function addToCart()
    {
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
                'useWallet' => ['nullable','string'],
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
        $this->validate(['quantity' => ['required', 'integer', 'min:1', 'max:100']]);

        //check if available
        if ($this->product->status != Product::STATUS_AVAILABLE) {
            return;
        }

        //check quantity
        if (!is_null($this->product->quantity) && $this->product->quantity < $this->quantity) {
            $this->addError('error', 'موجودی محصول به اتمام رسیده');
            return;
        }

        //validate form
        $this->resetErrorBag();
        foreach ($this->form as $key => $item) {
            if (FormBuilder::isVisible($this->form, $item) && $item['required'] && strlen($item['value']) == 0) {
                $this->addError('form.' . $key . '.error', __('validation.required', ['attribute' => '']));
            }
        }

        if (sizeof($this->getErrorBag()) > 0) {
            $this->addError('error', 'موارد خواسته شده را تکمیل کنید');
            return;
        }

        Cart::add($this->product, $this->quantity, $this->form);
		
		$this->payment();
        
    }

	public function resetInputs()
    {
        //set field
    }

}