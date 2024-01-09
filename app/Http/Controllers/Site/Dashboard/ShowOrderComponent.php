<?php

namespace App\Http\Controllers\Site\Dashboard;

use App\Models\Order;
use App\Models\OrderDetail;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ShowOrderComponent extends Component
{
    public $order;

    public function mount($id)
    {
        SEOMeta::setTitle('سفارش - فارس گیمر');
        OpenGraph::setTitle('سفارش - فارس گیمر');
        TwitterCard::setTitle('سفارش - فارس گیمر');
        JsonLd::setTitle('سفارش - فارس گیمر');

        $this->order = auth()->user()->orders()->with('details')->where('id', ((int) $id) - Order::CHANGE_ID)->firstOrFail();
    }

	public function download()
	{
		return Storage::download('/ticket/anthony.jpg');
	}

    public function render()
    {
        return view('site.dashboard.show-order-component')
            ->extends('site.layouts.site');
    }

    public function orderNotCompleted($id)
    {
        $rateKey = 'report-order-detail' . auth()->id() . '|' . $id;

        if (RateLimiter::tooManyAttempts($rateKey, 1)) {
            return;
        }

        RateLimiter::hit($rateKey, 24 * 60 * 60);

        OrderDetail::where('order_id', $this->order->id)
            ->where('id', $id)
            ->where('status', '!=', Order::STATUS_NOT_PAID)
            ->where('status', '!=', Order::STATUS_COMPLETED)
            ->update([
                'status' => Order::STATUS_DELAY,
            ]);

        $this->order = auth()->user()->orders()->with('details')->where('id', $this->order->id)->firstOrFail();
    }
}
