<?php

namespace App\Http\Controllers\Site\Dashboard;

use App\Models\OrderNote;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class MyNotificationsComponent extends Component
{
    public $userNotifications;

    public function render()
    {
        SEOMeta::setTitle('اعلانات - فارس گیمر');
        OpenGraph::setTitle('اعلانات - فارس گیمر');
        TwitterCard::setTitle('اعلانات - فارس گیمر');
        JsonLd::setTitle('اعلانات - فارس گیمر');

        $this->userNotifications = OrderNote::where('is_read', 0)->whereHas('order', function ($query){
            return $query->where('user_id', auth()->id());
        })->where('is_user_note', 1)
            ->latest()
            ->take(10)->get();

        OrderNote::where('is_read', 0)->whereHas('order', function ($query){
            return $query->where('user_id', auth()->id());
        })->where('is_user_note', 1)->update([
                'is_read' => true
            ]);

        return view('site.dashboard.notifications-component')
            ->extends('site.layouts.dashboard');
    }
}
