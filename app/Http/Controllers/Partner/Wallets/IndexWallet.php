<?php

namespace App\Http\Controllers\Partner\Wallets;

use App\Models\PaymentTransaction;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use App\Http\Controllers\Admin\BaseComponent;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class IndexWallet extends BaseComponent
{
    protected $listeners = [
        'updateData' => 'render'
    ];

    public $transactions;
    public $amount;
    public $verifiedTransaction, $isSuccessful, $message;
    public $Authority, $Status, $status, $token;

    protected $queryString = ['Authority', 'Status', 'token', 'status'];

    public function mount()
    {
      
        if (isset($this->Authority)) {
            $this->verifyTransaction();
        }
    }

    public function render()
    {
        $this->transactions = auth()->user()->walletTransactions()->where('confirmed', 1)->get();

        return view('partner.wallets.index-wallet')
            ->extends('admin.layouts.admin');
    }

    public function chargeWallet()
    {
        $this->validate(
            [
                'amount' => ['required', 'integer', 'min:1000', 'max:50000000'],
            ],
            [
                'min' => 'مبلغ نباید کمتر از 10,000 باشد',
                'max' => 'مبلغ نباید بیشتر از 50,000,000 باشد'
            ],
            [
                'amount' => 'مبلغ'
            ]
        );

        $this->amount = (int)$this->amount;

        try {
            $payment = Payment::via('zarinpal')->config([
					'mechandId' => config('payment.drivers.zarinpal.merchantId'),
					'description' => "wallet-".auth()->user()->mobile,
					// 'mode' => auth()->id() == '55867' ? 'sandbox' : 'normal'
				])->callbackUrl(route('partner.wallet'))
                ->purchase((new Invoice)->amount($this->amount), function ($driver, $transactionId) {

                    // $transaction = auth()->user()->deposit($this->amount, ['description' => 'شارژ آنلاین کیف پول', 'from_admin' => false], false);

                    PaymentTransaction::create([
                        'amount' => $this->amount,
                        'payment_gateway' => 'zarinpal',
                        'payment_token' => $transactionId,
                        'model_type' => 'transaction',
                        'model_id' => 0,
                        'user_id' => auth()->id(),
                    ]);

                })->pay()->toJson();

            $payment = json_decode($payment);
            return redirect($payment->action);
        } catch (PurchaseFailedException $exception) {
            $this->addError('amount', $exception->getMessage());
        }
    }

    public function verifyTransaction()
    {
        $this->verifiedTransaction = true;
        $data = PaymentTransaction::where('payment_token', $this->Authority)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        try {
            $payment = Payment::via('zarinpal')->amount($data->amount)->transactionId($this->Authority)->verify();

            $this->isSuccessful = true;
            $this->message = 'شارژ کیف پول با موفقیت انجام شد';

            // $wallet = auth()->user()->walletTransactions()->where('id', $data->model_id)->firstOrFail();

            // auth()->user()->confirm($wallet);

			$transaction = auth()->user()->deposit($data->amount, ['description' => 'شارژ آنلاین کیف پول', 'from_admin' => true]);
			
			$data->update([
				'model_id' => $transaction->id
			]);

            PaymentTransaction::where('payment_token', $this->Authority)->update([
                'payment_ref' => $payment->getReferenceId(),
                'status_code' => '100',
                'status_message' => 'پرداخت با موفقیت انجام شد',
            ]);

        } catch (InvalidPaymentException $exception) {
            PaymentTransaction::where('payment_token', $this->Authority)->update([
                'status_code' => $exception->getCode(),
                'status_message' => $exception->getMessage(),
            ]);

            $this->isSuccessful = false;
            $this->message = $exception->getMessage();
        }

        $this->reset(['Authority', 'status']);
    }
}
