<?php

namespace App\Http\Controllers\Admin\Wallets;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\CurrencyHistory;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexWallet extends BaseComponent
{
    use AuthorizesRequests;

	public $currency  , $tab , $category , $mainCategories;

	protected $queryString = ['currency','tab','category'];

	public $currency_id , $currency_count , $currency_price , $currency_product , $currency_description;

	public $edit_currency ,  $edit_currency_id , $edit_currency_count , $edit_currency_price , $edit_currency_description;

	public function mount()
	{
		$this->authorize('show_currencies');
		$this->data['product'] = Product::all()->pluck('title','id');
		
		$categories = [];
		$products = Product::with('category')->where('type',Product::TYPE_NORMAL_DELIVERY)->cursor();
		$this->mainCategories = Category::with('subCategories')->whereNull('parent_id')->get();

		// foreach ($products as $item) 
		// {
		// 	if (!in_array($item->category->title,array_keys($categories) ) ) {
		// 		$categories[$item->category->title] = [];
		// 		array_push($categories[$item->category->title] ,$item);
		// 	} else {
		// 		array_push($categories[$item->category->title] ,$item);
		// 	}
		// }

		
		// $this->data['product'] = $categories;
	}

	public function addMoney()
    {
        $this->resetErrorBag();
        $this->emit('showModel', ['addMoney']);
    }

	public function withrawMoney()
	{
		 $this->emit('showModel', ['withrawMoney']);
	}


	public function storeMoney()
	{
		$this->validate([
            'currency_id' => ['required', 'exists:currencies,id'],
            'currency_count' => ['required', 'integer','between:-99999999999.999,99999999999.999'],
			'currency_price' => ['required','between:-99999999999.999,99999999999.999'],
        ],[],[
			'currency_id' => 'ارز',
			'currency_count' => 'تعداد',
			'currency_price' => 'قیمت خرید'
		]);
		CurrencyHistory::create([
			'currency_id' => $this->currency_id,
			'count' => $this->currency_count,
			'amount' => $this->currency_price,
			'user_id' => auth()->id(),
		]);
		$this->reset(['currency_id','currency_count','currency_price']);
		 $this->emitNotify('فرم مورد نظر ثبت شد');
		 $this->emit('hideModel', ['addMoney']);
	}

	public function editItems($id)
	{
		$this->resetErrorBag();
		$this->edit_currency = CurrencyHistory::find($id);
		$this->edit_currency_id = $this->edit_currency->currency_id;
		$this->edit_currency_count = $this->edit_currency->count;
		$this->edit_currency_price = $this->edit_currency->amount;
		$this->edit_currency_description = $this->edit_currency->description;
        $this->emit('showModel', ['editHistory']);
	}

	public function storeEditItems()
	{
		$this->validate([
            'edit_currency_id' => ['required', 'exists:currencies,id'],
            'edit_currency_count' => ['required', 'numeric','between:-99999999999.999,99999999999.999'],
			'edit_currency_price' => ['required','between:-99999999999.999,99999999999.999'],
			'edit_currency_description' => ['nullable','max:255'],
        ],[],[
			'edit_currency_id' => 'ارز',
			'edit_currency_count' => 'تعداد',
			'edit_currency_price' => 'قیمت خرید',
			'edit_currency_description' => 'توضیحات'
		]);
		$this->edit_currency->currency_id = $this->edit_currency_id;
		$this->edit_currency->count = $this->edit_currency_count;
		$this->edit_currency->amount = $this->edit_currency_price;
		$this->edit_currency->description = $this->edit_currency_description;
		$this->edit_currency->save();
		$this->reset(['edit_currency_id','edit_currency_count','edit_currency_price','edit_currency_description']);
		$this->emitNotify('فرم مورد نظر ثبت شد');
		$this->emit('hideModel', ['editHistory']);
	}

	public function storeWithrawMoney()
	{
		$this->validate([
            'currency_id' => ['required', 'exists:currencies,id'],
            'currency_count' => ['required', 'numeric','between:-99999999999.999,99999999999.999'],
			'currency_price' => ['required','between:-99999999999.999,99999999999.999'],
			'currency_product' => ['nullable','max:255'],
			'currency_description' => ['nullable','max:255'],
        ],[],[
			'currency_id' => 'ارز',
			'currency_count' => 'تعداد',
			'currency_price' => 'قیمت خرید',
			'currency_product' => 'محصول',
			'currency_description' => 'توضیحات'
		]);
		CurrencyHistory::create([
			'currency_id' => $this->currency_id,
			'count' => -1*$this->currency_count,
			'amount' => $this->currency_price,
			'user_id' => auth()->id(),
			'product' => $this->currency_product,
			'description' => $this->currency_description
		]);
		$this->reset(['currency_id','currency_count','currency_price','currency_product','currency_description']);
		 $this->emitNotify('فرم مورد نظر ثبت شد');
		 $this->emit('hideModel', ['withrawMoney']);
	}

    public function render()
    {
		$currencies = Currency::latest()->get();
        $currencies_row = CurrencyHistory::latest('id')->with('currency')->when($this->currency,function($q){
			return $q->whereHas('currency',function($q){
				return $q->where('id',$this->currency);
			});
		})->when($this->category,function($q){
			return $q->whereHas('order',function($q){
				return $q->whereHas('product',function($q){
					return $q->whereHas('category',function($q){
						return $q->where('id',$this->category);
					});
				});
			});
		})->when($this->tab,function($q){
			if ($this->tab == 'deposit') {
				return $q->where('count','>',0);
			} elseif ($this->tab == 'harvest') {
				return $q->where('count','<',0);
			} elseif ($this->tab == 'deleted') {
				return $q->onlyTrashed();
			}
		})->paginate($this->perPage);

        return view('admin.wallets.index-wallet',['currencies_row'=>$currencies_row,'currencies'=>$currencies])
            ->extends('admin.layouts.admin');
    }

	public function deleteItems($id)
	{
		$item = CurrencyHistory::find($id);
		$item->deleted_by = auth()->id();
		$item->save();
		CurrencyHistory::destroy($id);
		$this->emitNotify('ردیف با موفقیت حذف شد');
	}
    
}