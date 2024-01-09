<?php

namespace App\Http\Controllers\Site\Settings;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class WhyUsComponent extends Component
{
    public function mount()
    {
        SEOMeta::setTitle('چرا فارس گیمر - فارس گیمر');
        SEOMeta::setDescription('چرا فارس گیمر - چرا ما - چگونه اعتماد کنیم');

        OpenGraph::setTitle('چرا فارس گیمر - فارس گیمر');
        OpenGraph::setDescription('چرا فارس گیمر - چرا ما - چگونه اعتماد کنیم');

        TwitterCard::setTitle('چرا فارس گیمر - فارس گیمر');
        TwitterCard::setDescription('چرا فارس گیمر - چرا ما - چگونه اعتماد کنیم');

        JsonLd::setTitle('چرا فارس گیمر - فارس گیمر');
        JsonLd::setDescription('چرا فارس گیمر - چرا ما - چگونه اعتماد کنیم');
    }

    public function render()
    {
        return view('site.settings.why-us')
            ->extends('site.layouts.site');
    }
}
