<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Cart\Facades\Cart;
use App\Models\Notification;
use App\Models\OrderNote;
use App\Models\Setting;
use Livewire\Component;

class Header2 extends Component
{
    protected $listeners = ['updateBasketCount'];

    public $notifications, $userNotifications = [];
    public $q;
    public $basketCount = 0;

    public function mount()
    {
		$site_status = Setting::where('name', 'site_close')->first()->value;

		if ($site_status == 1)
		{
			abort(503);
		}
		

        $this->notifications = Notification::all();
        if (auth()->check()){
            $this->userNotifications = OrderNote::where('is_read', 0)->whereHas('order', function ($query){
                return $query->where('user_id', auth()->id());
            })->where('is_user_note', 1)
                ->latest()
                ->take(10)
                ->get();
        }

        $this->q = request()->get('q', null);
        $this->basketCount = Cart::count();
    }

    public function render()
    {
        return view('site.components.layouts.header2')
            ->extends('site.layouts.site');
    }

    public function updateSearch()
    {
        redirect()->route('products', ['q' => $this->q]);
    }

    public function updateBasketCount()
    {
        $this->basketCount = Cart::count();
    }

    public function readNotifications()
    {
        OrderNote::where('is_read', 0)->whereHas('order', function ($query){
            return $query->where('user_id', auth()->id());
        })->where('is_user_note', 1)->update([
            'is_read' => true
        ]);
    }
}
