<?php

namespace App\Http\Controllers\Partner\Orders;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NewOrder extends BaseComponent
{
    use AuthorizesRequests;

    public $statusCount;

	protected $queryString = ['category'];

    public $mainCategories, $category;


	public function mount()
	{
		
		$this->mainCategories = Category::with('subCategories')->whereNull('parent_id')->get();
	}

    public function render()
    {
		$categories = [];
		$products = Product::with('category')->where([
			['partner_amount' ,'>' ,0],
			['status',Product::STATUS_AVAILABLE]
		])->when($this->category,function($q){
			return $q->whereHas('category',function($q){
				return $q->where('slug',$this->category);
			});
		})->search($this->search)->get();

		


		foreach ($products as $item) 
		{
			if (!in_array($item->category->title,array_keys($categories) ) ) {
				$categories[$item->category->title] = [];
				array_push($categories[$item->category->title] ,$item);
			} else {
				array_push($categories[$item->category->title] ,$item);
			}
		}
		
		
        return view('partner.orders.new-order',['categories'=>$categories])->extends('admin.layouts.admin');
    }

}