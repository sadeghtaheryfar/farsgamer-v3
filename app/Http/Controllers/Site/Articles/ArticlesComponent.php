<?php

namespace App\Http\Controllers\Site\Articles;

use App\Models\Article;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;
use Livewire\WithPagination;

class ArticlesComponent extends Component
{
    use WithPagination;
	//public $cat = 'بدون دسته بندی';
    public $perPage = 12;

    public function mount()
    {
        SEOMeta::setTitle('مقالات - فارس گیمر');
        SEOMeta::setDescription('مقالات فارس گیمر - آموزش بازی');

        OpenGraph::setTitle('مقالات - فارس گیمر');
        OpenGraph::setDescription('مقالات فارس گیمر - آموزش بازی');

        TwitterCard::setTitle('مقالات - فارس گیمر');
        TwitterCard::setDescription('مقالات فارس گیمر - آموزش بازی');

        JsonLd::setTitle('مقالات - فارس گیمر');
        JsonLd::setDescription('مقالات فارس گیمر - آموزش بازی');
		
    }

    public function render()
    {
        $articles = Article::latest()->paginate($this->perPage);
        $LastArticles = Article::latest()->take(5)->get();
        return view('site.articles.articles-component', ['articles' => $articles, 'LastArticles' => $LastArticles])
            ->extends('site.layouts.site');
    }
}
