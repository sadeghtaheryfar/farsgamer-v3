<?php

namespace App\Http\Controllers\Site\Dashboard;

use App\Models\Order;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Livewire\WithPagination;

class MyOrdersComponent extends Component
{
    use WithPagination;

    public $perPage = 12;

    public function mount()
    {
        SEOMeta::setTitle('سفارشات من - فارس گیمر');
        OpenGraph::setTitle('سفارشات من - فارس گیمر');
        TwitterCard::setTitle('سفارشات من - فارس گیمر');
        JsonLd::setTitle('سفارشات من - فارس گیمر');
    }

    public function render()
    {
        $orders = auth()->user()->orders()->with(['details', 'userNotes'])->paginate($this->perPage);

        return view('site.dashboard.my-orders-component',['orders' => $orders])
            ->extends('site.layouts.dashboard');
    }
}
