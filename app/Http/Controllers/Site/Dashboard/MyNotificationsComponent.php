<?php

namespace App\Http\Controllers\Site\Dashboard;

use Livewire\Component;
use App\Models\OrderNote;
use App\Models\Notification;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class MyNotificationsComponent extends Component
{
    public $notifications, $userNotifications = [];

    public function render()
    {
        SEOMeta::setTitle('اعلانات - فارس گیمر');
        OpenGraph::setTitle('اعلانات - فارس گیمر');
        TwitterCard::setTitle('اعلانات - فارس گیمر');
        JsonLd::setTitle('اعلانات - فارس گیمر');

        $this->notifications = Notification::all();

        $this->userNotifications = OrderNote::where('is_read', 0)->whereHas('order', function ($query) {
            return $query->where('user_id', auth()->id());
        })->where('is_user_note', 1)
            ->latest()
            ->get();

        OrderNote::where('is_read', 0)->whereHas('order', function ($query) {
            return $query->where('user_id', auth()->id());
        })->where('is_user_note', 1)->update([
            'is_read' => true
        ]);

        return view('site.dashboard.notifications-component')
            ->extends('site.layouts.dashboard');
    }
}
