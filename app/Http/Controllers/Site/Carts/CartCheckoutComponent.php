<?php

namespace App\Http\Controllers\Site\Carts;

use App\Http\Controllers\Cart\Facades\Cart;
use App\Http\Controllers\Smsir\Facades\Smsir;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\PaymentTransaction;
use App\Models\Product;
use App\Models\CurrencyHistory;
use App\Models\Score;
use App\Models\DepotItem;
use App\Models\Depot;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;

class CartCheckoutComponent extends Component
{
    public $data;
    public $isSuccessful, $message;
    public $gateway;
    public $Authority, $Status, $status, $token, $tracking;

    protected $queryString = ['gateway', 'Authority', 'Status', 'token', 'status', 'tracking'];

    public function mount($gateway = null)
    {
        $this->gateway = $gateway;

        SEOMeta::setTitle('سفارش - فارس گیمر');
        OpenGraph::setTitle('سفارش - فارس گیمر');
        TwitterCard::setTitle('سفارش - فارس گیمر');
        JsonLd::setTitle('سفارش - فارس گیمر');


        $this->getOrder();

        if ($this->data->status != Order::STATUS_NOT_PAID) {
            $this->isSuccessful = true;
            $this->message = 'پرداخت با موفقیت انجام شد با تشکر از خرید شما';
            return;
        }

        if (is_null($this->gateway)) {
            $this->success();
        } else {
            try {
                if ($this->gateway == 'payir') {
                    $payment = Payment::via($this->gateway)->amount($this->data->total_price)->transactionId($this->token)->verify();
                } else {
                    $payment = Payment::via($this->gateway)->amount($this->data->total_price)->transactionId($this->Authority)->verify();
                }

                $this->success($payment);

            } catch (InvalidPaymentException $exception) {
                if ($this->gateway == 'payir') {
                    PaymentTransaction::where('payment_token', $this->token)->update([
                        'status_code' => $exception->getCode(),
                        'status_message' => $exception->getMessage(),
                    ]);
                } else {
                    PaymentTransaction::where('payment_token', $this->Authority)->update([
                        'status_code' => $exception->getCode(),
                        'status_message' => $exception->getMessage(),
                    ]);
                }


                $this->isSuccessful = false;
                $this->message = $exception->getMessage();
            }
        }

        Cart::destroy();
    }

    public function render()
    {
		if ($this->data->partner_id == 0)
			return view('site.carts.cart-checkout-component')->extends('site.layouts.cart');
		else 
			return view('partner.carts.cart-checkout-component')->extends('admin.layouts.admin');
    }

    public function tryAgain()
    {
        if (Carbon::make($this->data->created_at)->addHours(12)->isFuture() &&
            !PaymentTransaction::where('model_id', $this->data->id)
                ->where('status_code', '100')->exists()) {

            $payment = Payment::via($this->gateway)->callbackUrl(env('APP_URL') . '/cart/checkout/' . $this->gateway)
                ->purchase((new Invoice)
                    ->amount($this->data->total_price), function ($driver, $transactionId) {

                    PaymentTransaction::create([
                        'amount' => $this->data->total_price,
                        'payment_gateway' => $this->gateway,
                        'payment_token' => $transactionId,
                        'model_type' => 'order',
                        'model_id' => $this->data->id,
                        'user_id' => auth()->id(),
                    ]);
                })->pay()->toJson();

            $payment = json_decode($payment);
            return redirect($payment->action);
        }
    }

    private function success($payment = null)
    {
        $this->isSuccessful = true;
        $this->message = 'پرداخت با موفقیت انجام شد با تشکر از خرید شما';

        if (!is_null($payment) && !PaymentTransaction::where('payment_ref', $payment->getReferenceId())->exists()) {

            if ($this->gateway == 'payir') {
                PaymentTransaction::where('payment_token', $this->token)->update([
                    'payment_ref' => $payment->getReferenceId(),
                    'status_code' => '100',
                    'status_message' => 'پرداخت با موفقیت انجام شد',
                ]);
            } else {
                PaymentTransaction::where('payment_token', $this->Authority)->update([
                    'payment_ref' => $payment->getReferenceId(),
                    'status_code' => '100',
                    'status_message' => 'پرداخت با موفقیت انجام شد',
                ]);
            }

            OrderNote::create([
                'note' => 'پرداخت با موفقیت انجام شد. کد پیگیری درگاه: ' . $payment->getReferenceId(),
                'is_user_note' => 1,
                'is_read' => 0,
                'order_id' => $this->data->id,
            ]);
        }

        $score = 0;
        foreach ($this->data->details as $detail) {
            $product = Product::with('licenses')->where('id', $detail->product_id)->firstOrFail();

            $score += $product->score;

            if (!is_null($product->quantity)) {
                $product->quantity = max($product->quantity - $detail->quantity, 0);
				if ($product->quantity == 0)
				{
					$product->status = Product::STATUS_UNAVAILABLE;	
				}
				elseif ($product->quantity < 2 )
				{
					$product->status = Product::STATUS_TOWARDS_THE_END;
				}
            }
			$product->save();
			
            $this->getLicensesCode($detail, $product);
        }
		if ($detail->order->partner_id == 0) {
			Score::create([
				'amount' => $score,
				'type' => Score::TYPE_DEPOSIT,
				'description' => 'بابت سفارش ' . $this->data->tracking_code,
				'order_id' => $this->data->id,
				'user_id' => auth()->id(),
        	]);
		}
    }

    private function getLicensesCode($detail, $product)
    {
        //licenses products
        if ($product->type == Product::TYPE_INSTANT_DELIVERY) {
            $licenses = [];
            // $licensesCode = $product->licenses()->isNotUsed()->take($detail->quantity)->get();


			$pID= $product->id;
			$salt = '12$#dAe)O@c$5*2Cn#g/sV^55!wX';
			$md5 = md5($salt.$pID.$salt);
			$orderId = (int)$detail->id + Order::CHANGE_ID;
			$code = $md5."-".$pID."-".auth()->id()."-".$orderId;
			$response  = Http::accept('application/json')->post('https://container.elfiro.com/api/v1/data',[
				'phone' => $detail->order->user->mobile,
				'count' => $detail->quantity,
				'code' => base64_encode($code),
				'exit_price' => $detail->price,
				'product_title' => $product->title,
				'base_id' => (int)$detail->order->id + Order::CHANGE_ID
				]);
				if (auth()->id()== 55867) {
					// dd($response->json(),base64_encode($code));
				}
				
            if ($response->status() != 200 || auth()->id() == 55867) {
				
                $this->notEnoughLicensesCode($product->title);

                $detail->status = Order::STATUS_PROCESSING;
                $detail->save();

                Smsir::replaceAdminAndSend($this->data, $detail, Order::STATUS_PROCESSING);
				if ($product->manager_sms == 1)
                	Smsir::replaceManagerAndSend($this->data, $detail, Order::STATUS_PROCESSING);

                Smsir::replaceUserAndSend($this->data, $detail, Order::STATUS_PROCESSING);
            } else {
				$licenses = explode(',',base64_decode($response->json()['data']['licenses']));

				if ($detail->product->buy_amount > 0 && !is_null($detail->product->currency_id)  )
				{
					CurrencyHistory::create([
							'currency_id' => $detail->product->currency_id,
							'count' => -1*($detail->product->buy_amount * $detail->quantity),
							'user_id' => $detail->order->user_id,
							'amount' => $detail->product->currency->amount,
							'order_id' => $detail->id,
							'product' => $detail->product->title,
							'description' => ' تکمیل سفارش'.' کد سفارش : '.$detail->order->id,
						]);
				}

                $detail->status = Order::STATUS_COMPLETED;
                $detail->licenses = $licenses;
                $detail->save();

                Smsir::replaceAdminAndSend($this->data, $detail, Order::STATUS_COMPLETED);
				if ($product->manager_sms == 1)
                	Smsir::replaceManagerAndSend($this->data, $detail, Order::STATUS_COMPLETED);
                Smsir::replaceUserAndSend($this->data, $detail, Order::STATUS_COMPLETED);
                // Smsir::sendLicensesCode($this->data, $detail);
				Smsir::sendLicensesCodeNew($this->data, $detail);	
            }
        } elseif ($product->type == Product::TYPE_TICKET) {
			$status = Order::STATUS_COMPLETED;
            $detail->status = $status;
            $detail->save();
			Smsir::replaceUserAndSend($this->data, $detail, 'ticket');
			Smsir::replaceAdminAndSend($this->data, $detail, Order::STATUS_COMPLETED);
		} else {
            $status = Order::STATUS_PROCESSING;
            foreach ($detail->form as $form) {
                if (($form['type'] ?? '') == 'speedPlus' && $form['value'] != 'خیر') {
                    $status = Order::STATUS_SPEED_PLUS;
                }
            }

            $detail->status = $status;
            $detail->save();

            Smsir::replaceAdminAndSend($this->data, $detail, Order::STATUS_PROCESSING);
			if ($product->manager_sms == 1)
            	Smsir::replaceManagerAndSend($this->data, $detail, Order::STATUS_PROCESSING);
            Smsir::replaceUserAndSend($this->data, $detail, Order::STATUS_PROCESSING);
        }
    }

    private function notEnoughLicensesCode($productTitle)
    {
        $numbers = Setting::where('name', 'admin_numbers')->first();
        foreach (explode(',', $numbers) as $number) {
            Smsir::send("موجودی لاینسیس محصول $productTitle تمام شده", $number);
        }
    }

    public function orderNotCompleted($id)
    {
        $rateKey = 'report-order-detail' . auth()->id() . '|' . $id;
        if (RateLimiter::tooManyAttempts($rateKey, 1)) {
            return;
        }

        RateLimiter::hit($rateKey, 24 * 60 * 60);

        OrderDetail::where('order_id', $this->data->id)
            ->where('id', $id)
            ->where('status', '!=', Order::STATUS_NOT_PAID)
            ->where('status', '!=', Order::STATUS_COMPLETED)
            ->update([
                'status' => Order::STATUS_DELAY,
            ]);

        $this->data = auth()->user()->orders()->with('details')->where('id', $this->data->id)->firstOrFail();
    }

    private function getOrder()
    {
        if ($this->gateway == 'zarinpal') {
            $transaction = PaymentTransaction::where('payment_gateway', 'zarinpal')
                ->where('payment_token', $this->Authority)
                ->where('model_type', 'order')
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $this->data = Order::with('details.product')
                ->where('user_id', auth()->id())->where('id', $transaction->model_id)->firstOrFail();
        } elseif ($this->gateway == 'payir') {
            $transaction = PaymentTransaction::where('payment_gateway', 'payir')
                ->where('payment_token', $this->token)
                ->where('model_type', 'order')
                ->firstOrFail();

            $this->data = Order::with('details.product')
                ->where('user_id', auth()->id())->where('id', $transaction->model_id)->firstOrFail();
        } else {
            $this->data = Order::with('details.product')->where('user_id', auth()->id())
                ->where('total_price', 0)
                ->where('id', $this->tracking - Order::CHANGE_ID)->firstOrFail();
        }
    }

	public function download()
	{
		return Storage::download('ticket/anthony.jpg');
	}

}
