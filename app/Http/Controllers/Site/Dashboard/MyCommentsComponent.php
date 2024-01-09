<?php

namespace App\Http\Controllers\Site\Dashboard;

use App\Models\Order;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class MyCommentsComponent extends Component
{
    public $comments = [];
    public $confirmedComments = [];

    public function mount()
    {
        SEOMeta::setTitle('نظرات من - فارس گیمر');
        OpenGraph::setTitle('نظرات من - فارس گیمر');
        TwitterCard::setTitle('نظرات من - فارس گیمر');
        JsonLd::setTitle('نظرات من - فارس گیمر');
    }

    public function render()
    {
        foreach ( auth()->user()->orders()->with('details.product')->get() as $order) {
            foreach ($order->details as $detail) {
                if ($detail->status == Order::STATUS_COMPLETED &&
                    ! auth()->user()->comments()->withTrashed()
                    ->where('commentable_type', 'product')
                    ->where('commentable_id', $detail->product_id)
                    ->where('order_id', $detail->order_id)
                    ->exists()) {
                    $this->comments[] = $detail;
                }
            }
        }

        $this->confirmedComments = auth()->user()->comments()->get();
		
        return view('site.dashboard.my-comments-component')
            ->extends('site.layouts.dashboard');
    }

}
