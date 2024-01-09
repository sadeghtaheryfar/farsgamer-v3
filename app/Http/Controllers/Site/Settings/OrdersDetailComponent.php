<?php

namespace App\Http\Controllers\Site\Settings;

use App\Models\Setting;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Notification;
use App\Models\OrderNote;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class OrdersDetailComponent extends Component
{
    public $slider;
    public $description;
	public $table = false;
	public $notifications, $userNotifications = [];
	public $code,$phoneNumber,$orders,$singleOrder,$alert;
    public $faqs,$orderCode,$phone;
	public $search = 'جستجو';
    public function mount()
    {
       
        SEOMeta::setTitle('پیگیری سفارش  - فارس گیمر');
        SEOMeta::setDescription('پیگیری سفارش  - پیگیری سفارش  فارس گیمر');

        OpenGraph::setTitle('پیگیری سفارش  - فارس گیمر');
        OpenGraph::setDescription('پیگیری سفارش  - پیگیری سفارش  فارس گیمر');

        TwitterCard::setTitle('پیگیری سفارش  - فارس گیمر');
        TwitterCard::setDescription('پیگیری سفارش  - پیگیری سفارش  فارس گیمر');

        JsonLd::setTitle('پیگیری سفارش  - فارس گیمر');
        JsonLd::setDescription('پیگیری سفارش  - سوالات متداول فارس گیمر');
        $this->faqs = Setting::where('name','faqs')->get()->pluck('value', 'id')->groupBy('category');
    }


	public function showOrder()
	{
		$code = $this->code;
		$this->emit('showOrder');
		$phone = $this->phoneNumber;
		$orderCode = (int)$code-Order::CHANGE_ID;
		$code = $orderCode;
		if ($code && $phone){
			$this->alert = 'لطفا چند لحظه صبر کنید';
			$this->orders = OrderDetail::where('order_id',$code)->get();
			$this->singleOrder = Order::where('id',$code)->first();
			$single = Order::where('id',$code)->where('mobile',$phone)->first();
			//dd($single);
			if (!empty($this->orders->toArray()) && $single <> null) {
				$this->notifications = Notification::where('is_read',0)->get()->toArray();
				// dd($this->notifications);
				if (auth()->check()){
					$this->userNotifications = OrderNote::where('is_read', 0)->whereHas('order', function ($query){
						return $query->where('user_id', auth()->id());
					})->where('is_user_note', 1)
						->latest()
						->take(10)
						->get();
				}
				$this->alert = '';
				$this->table = true;
			} else {
				$this->search = 'جستجو';
				$this->alert = 'سفارشی با این مشخصات وجود ندارد';
			}
		} else {
			$this->alert = 'لطفا فیلد هارا تکمیل نمایید';
		}
		
	}
	public function backForm(){
		$this->table = false;
	}
    public function render()
    {
        return view('site.settings.faqs-orders-detail-component')
            ->extends('site.layouts.site');
    }
}
