<?php

namespace App\Http\Controllers\Site\Settings;

use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class LotteryComponent extends Component
{
    public $faqs , $images ,$i = 0;

    public function mount()
    {
		if (!Setting::getSingleRow('lottery')) abort(404);

        SEOMeta::setTitle('قرعه کشی - فارس گیمر');
        SEOMeta::setDescription('قرعه کشی - قرعه کشی فارس گیمر');

        OpenGraph::setTitle('قرعه کشی - فارس گیمر');
        OpenGraph::setDescription('قرعه کشی - قرعه کشی فارس گیمر');

        TwitterCard::setTitle('قرعه کشی - فارس گیمر');
        TwitterCard::setDescription('قرعه کشی - قرعه کشی فارس گیمر');

        JsonLd::setTitle('قرعه کشی - فارس گیمر');
        JsonLd::setDescription('قرعه کشی - قرعه کشی فارس گیمر');
    }

    public function render()
    {
        return view('site.settings.lottery-component')
            ->extends('site.layouts.site');
    }
}
