<?php

namespace App\Http\Controllers\Site\Settings;

use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class RuleComponent extends Component
{
    public $description;
    public $physicalDescription;
    public $rules;
    public $physicalRules;

    public function mount()
    {
        SEOMeta::setTitle('قوانین - فارس گیمر');
        SEOMeta::setDescription('قوانین فارس گیمر - مقررات فارس گیمر');

        OpenGraph::setTitle('قوانین - فارس گیمر');
        OpenGraph::setDescription('قوانین فارس گیمر - مقررات فارس گیمر');

        TwitterCard::setTitle('قوانین - فارس گیمر');
        TwitterCard::setDescription('قوانین فارس گیمر - مقررات فارس گیمر');

        JsonLd::setTitle('قوانین - فارس گیمر');
        JsonLd::setDescription('قوانین فارس گیمر - شرایط و قوانین استفاده از سایت کافه گیم - مقررات فروشگاه کافه گیم');

        $this->description = Setting::getSingleRow('rules');
        $this->rules = Setting::where('name','rules')->get()->skip(1);

        $this->physicalDescription = Setting::getSingleRow('physical_rules');
        $this->physicalRules = Setting::where('name','physical_rules')->get()->skip(1);
    }

    public function render()
    {
        return view('site.settings.rules-component')
            ->extends('site.layouts.site');
    }
}
