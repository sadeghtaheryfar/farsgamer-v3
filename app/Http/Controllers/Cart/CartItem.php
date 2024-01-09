<?php

namespace App\Http\Controllers\Cart;

use App\Models\Product;

class CartItem
{
    public $id;
    public $title;
    public $image;
    public $quantity;
    public $currency;
    public $price;
    public $partnerPrice;
    public $discount;
    public $form;
    public $delivery_time;
	public $file = '';

    public function __construct(Product $product, $quantity, $form , $file = '')
    {
        $this->id = $product->id;
        $this->title = $product->title;
        $this->image = $product->image;
        $this->quantity = $quantity;
		if ($product->const_price)
			$this->currency = 1;
		else	
        	$this->currency = $product->currency->amount ?? 1;

        $this->price = $product->price;
        $this->partnerPrice = $product->partner_price;
        $this->discount = $product->discount_amount_fixed;
        $this->form = $form;
        $this->delivery_time = $product->delivery_time;
        $this->file = $file;
    }

    public function price()
    {
        if (auth()->check() && auth()->user()->hasRole('همکار')  &&  $this->partnerPrice() > 0){
            return ($this->partnerPrice() + $this->formPrice()) * $this->quantity;
        }

        return ($this->price + $this->formPrice()) * $this->quantity;
    }

    public function partnerPrice()
    {
        return ($this->partnerPrice);
    }

    public function discount()
    {
        return $this->discount * $this->quantity;
    }

    public function total()
    {
        if (auth()->check() && auth()->user()->hasRole('همکار') && $this->partnerPrice() > 0){
            return $this->partnerPrice();
        }

        return $this->price() - $this->discount();
    }

    private function formPrice()
    {
        $form = collect($this->form);

        return $form->reduce(function ($total, $item) {

            $selectedValue = $item['value'] ?? '';
			$optionPrice = 0;
			if (isset($item['type']) && $item['type'] == 'range') {
				$total += $selectedValue * $item['formBasePrice'];
			} else {
				$options = collect($item['options'] ?? []);
				$optionPrice = $options->reduce(function ($total, $item) use ($selectedValue) {
					$price = 0;
					if ($item['value'] == $selectedValue) {
						$price = (int)$total + (int)$item['price'] * $this->currency;
					}

					return $total + $price;
				}, 0);
			}
            

            return $total + $optionPrice;
        }, 0);
    }
}