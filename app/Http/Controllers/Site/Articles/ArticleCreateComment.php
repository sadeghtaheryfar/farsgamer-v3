<?php

namespace App\Http\Controllers\Site\Articles;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class ArticleCreateComment extends Component
{
    public $article;
    public $comment;

    public function mount($article)
    {
        $this->article = $article;
    }

    public function render()
    {
        return view('site.articles.articles-create-comment')
            ->extends('site.layouts.site');
    }

    protected function rules()
    {
        return [
            'comment' => ['required', 'string', 'max:250'],
        ];
    }

    public function store()
    {
        $this->validate();

        $rateKey = 'article-comment:' . auth()->user()->id;
        RateLimiter::hit($rateKey, 24*60*60);
        if (RateLimiter::tooManyAttempts($rateKey, 5)) {
            $this->resetInputs();
            $this->addError('comment', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
            return;
        }

        DB::transaction(function () {
            $this->article->comments()->create([
                'comment' => $this->comment,
                'user_id' => auth()->id(),
            ]);
        });

        $this->resetInputs();
        session()->flash('article-comment-created', 'نظر شما با موفقیت ثبت شد و پس از تایید منتشر می شود');
    }

    private function resetInputs()
    {
        $this->reset(['comment']);
    }
}
