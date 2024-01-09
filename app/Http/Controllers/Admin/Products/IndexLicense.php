<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Http;

class IndexLicense extends BaseComponent
{
    use AuthorizesRequests;

    public $mainCategories, $category , $codes;

	public function mount()
	{
		$response  = Http::accept('application/json')->get('https://container.elfiro.com/api/v1/products');
		$this->codes = collect($response->json()['data'])->pluck('count','product_id');
		// dd($this->codes);
	}

    public function render()
    {
		$categories = [];
        $this->authorize('license');
		$products = Product::with('category')->withCount(['licenses' => function($q){
			return $q->where('is_used',0);
		}])->where('type',Product::TYPE_INSTANT_DELIVERY)->orderBy('licenses_count','desc')->get();


		foreach ($products as $item) 
		{
			if (!in_array($item->category->title,array_keys($categories) ) ) {
				$categories[$item->category->title] = [];
				array_push($categories[$item->category->title] ,$item);
			} else {
				array_push($categories[$item->category->title] ,$item);
			}
		}
		
        
        return view('admin.products.index-license', ['categories' => $categories])
            ->extends('admin.layouts.admin');
    }


}