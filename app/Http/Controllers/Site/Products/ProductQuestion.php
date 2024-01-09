<?php

namespace App\Http\Controllers\Site\Products;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class ProductQuestion extends Component
{
    public $product;
    public $question;
    public $answers;
    public $answer;

    public function mount($product, $question)
    {
        $this->product = $product;
        $this->question = $question;
        $this->answers = $question->answers()->isConfirmed()->get();
    }

    public function render()
    {
        return view('site.products.products-question')
            ->extends('site.layouts.site');
    }

    protected function rules()
    {
        return [
            'answer' => ['required', 'string', 'max:250'],
        ];
    }

    public function storeAnswer()
    {
        $this->validate();

        RateLimiter::hit('product-answer:' . $this->question->id . '-' . auth()->user()->id, 24 * 60 * 60);
        if (RateLimiter::tooManyAttempts('product-answer:' . $this->question->id . '-' . auth()->user()->id, 5)) {
            $this->resetInputs();
            $this->addError('answer', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
            return;
        }

        DB::transaction(function () {
            $this->product->questions()->create([
                'text' => $this->answer,
                'parent_id' => $this->question->id,
                'user_id' => auth()->id(),
            ]);
        });

        $this->resetInputs();

        session()->flash('product-answer-created', 'پاسخ شما با موفقیت ثبت شد و پس از تایید منتشر می شود');
    }

    private function resetInputs()
    {
        $this->reset(['answer']);
    }
}
