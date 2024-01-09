<?php

namespace App\Http\Controllers\Site\Settings;

use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class FaqsComponent extends Component
{
    public $faqs , $images ,$i = 0;

    public function mount()
    {
        SEOMeta::setTitle('سوالات متداول - فارس گیمر');
        SEOMeta::setDescription('سوالات متداول - سوالات متداول فارس گیمر');

        OpenGraph::setTitle('سوالات متداول - فارس گیمر');
        OpenGraph::setDescription('سوالات متداول - سوالات متداول فارس گیمر');

        TwitterCard::setTitle('سوالات متداول - فارس گیمر');
        TwitterCard::setDescription('سوالات متداول - سوالات متداول فارس گیمر');

        JsonLd::setTitle('سوالات متداول - فارس گیمر');
        JsonLd::setDescription('سوالات متداول - سوالات متداول فارس گیمر');
		$this->images = [
			'site/images/faq.png','site/images/undraw_order_delivered_re_v4ab.png','site/images/undraw_pay_online_b1hk.png','site/images/undraw_Questions_re_1fy7.png'
			];
        $this->faqs = Setting::where('name','faqs')->get()->pluck('value', 'id')->groupBy('category');
    }

    public function render()
    {
        return view('site.settings.faqs-component')
            ->extends('site.layouts.site');
    }
}
