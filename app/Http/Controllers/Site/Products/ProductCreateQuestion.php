<?php

namespace App\Http\Controllers\Site\Products;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class ProductCreateQuestion extends Component
{
    public $product;
    public $question;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('site.products.products-create-question')
            ->extends('site.layouts.site');
    }

    protected function rules()
    {
        return [
            'question' => ['required','string','max:250'],
        ];
    }

    public function storeQuestion()
    {
        $this->validate();

        RateLimiter::hit('product-question:' . auth()->user()->id, 24*60*60);
        if (RateLimiter::tooManyAttempts('product-question:' . auth()->user()->id, 5)) {
            $this->resetInputs();
            $this->addError('question', 'زیادی تلاش کردید. لطفا پس از مدتی دوباره تلاش کنید.');
            return;
        }

        DB::transaction(function () {
            $this->product->questions()->create([
                'text' => $this->question,
                'user_id' => auth()->id(),
            ]);
        });

        $this->resetInputs();

        session()->flash('product-question-created', 'پرسش شما با موفقیت ثبت شد');
    }

    private function resetInputs()
    {
        $this->reset(['question']);
    }
}
