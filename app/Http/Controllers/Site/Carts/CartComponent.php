<?php

namespace App\Http\Controllers\Site\Carts;

use App\Http\Controllers\Cart\Facades\Cart;
use App\Models\Product;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class CartComponent extends Component
{
    public $quantities;

    public function mount()
    {
        SEOMeta::setTitle('سبد خرید - فارس گیمر');
        OpenGraph::setTitle('سبد خرید - فارس گیمر');
        TwitterCard::setTitle('سبد خرید - فارس گیمر');
        JsonLd::setTitle('سبد خرید - فارس گیمر');


        foreach (Cart::content() as $item) {
            $this->quantities[$item->id] = $item->quantity;
        }
    }

    public function updated($name, $value)
    {
        $elements = explode('.', $name);

        if ($elements[0] == 'quantities') {
            $this->validate(['quantities.' . $elements[1] => ['required', 'integer', 'min:1', 'max:100']]);
            $product = Product::find($elements[1]);
            if (!is_null($product->quantity) && $product->quantity < $value) {
                return;
            }
            Cart::update($elements[1], $value);
        }
    }

    public function render()
    {
        $this->emit('updateBasketCount');

        return view('site.carts.cart-component')
            ->extends('site.layouts.cart');
    }

    public function delete($key)
    {
        try {
            Cart::delete($key);
        } catch (\Exception $exception) {
            //
        }
    }
}
