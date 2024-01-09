<?php

namespace App\Http\Controllers\Site\Articles;

use App\Models\Article;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComponent extends Component
{
    use WithPagination;

    public $readyToLoad = false;

    public $article;
    public $commentsCount = 0;
    public $prePageComment = 15;	
    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->firstOrFail();
        $this->commentsCount = $this->article->comments()->isConfirmed()->count();

        SEOMeta::setTitle($this->article->title);
        SEOMeta::setDescription($this->article->seo_description);

		SEOMeta::addMeta('author', 'محمد علی رسولی', 'name');
		SEOMeta::addMeta('robots', 'index,follow', 'name');
		SEOMeta::addMeta('dcterms.rightsHolder', 'کپی‌رایت © - فارس گیمر - کلیه حقوق محفوظ است.', 'name');

        OpenGraph::setTitle($this->article->title);
        OpenGraph::setDescription($this->article->seo_description);

        TwitterCard::setTitle($this->article->title);
        TwitterCard::setDescription($this->article->seo_description);

        JsonLd::setTitle($this->article->title);
        JsonLd::setDescription($this->article->seo_description);

    }

    public function render()
    {
        $comments = $this->readyToLoad ? $this->article->comments()->isConfirmed()->paginate($this->prePageComment) : [];

        return view('site.articles.article-component', ['comments' => $comments])
            ->extends('site.layouts.site');
    }

    public function loadMore($pageName)
    {
        $this->prePageComment += 15;
    }
}
