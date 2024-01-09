<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use App\Models\Product;
use App\Traits\Admin\FormBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexProduct extends BaseComponent
{
    use AuthorizesRequests;
    use FormBuilder;

    public $mainCategories, $category , $status;

	protected $queryString = ['status'];

    public function mount()
    {
        $this->mainCategories = Category::with('subCategories')->whereNull('parent_id')->get();
		$this->data['status'] = Product::getProductsStatus();
    }

    public function render()
    {
        $this->authorize('show_products');

        if (auth()->user()->hasPermissionTo('product_manager')){
            $products = Product::latest()
                ->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%')
                ->with(['currency'])
                ->when($this->category, function ($query){
                    $categoriesId = Category::where('parent_id', $this->category)->get()->pluck('id');
                    return $query->whereIn('category_id', $categoriesId);
                })->when($this->status, function ($query) {
					return $query->where('status', $this->status);
				})
                ->search($this->search)
                ->paginate($this->perPage);
        } else {

        $products = Product::latest()
            ->with(['currency'])
            ->when($this->category, function ($query){
                $categoriesId = Category::where('parent_id', $this->category)->get()->pluck('id')->toArray();
                return $query->whereIn('category_id', array_merge($categoriesId, [$this->category]));
            })->when($this->status, function ($query) {
					return $query->where('status', $this->status);
				})
            ->search($this->search)
            ->paginate($this->perPage);
        }

        return view('admin.products.index-product', ['products' => $products])
            ->extends('admin.layouts.admin');
    }

    public function delete($id)
    {
        $this->authorize('delete_products');
		$product = Product::findOrFail($id);
		if ($product->category->id == 5 || $product->category->parent_id == 5)
		{
			$this->authorize('gift_cards');
		}
		
		$product->delete();
        $this->emitNotify('محصول با موفقیت حذف شد');
    }
}