<?php

namespace App\Http\Controllers\Admin\Depot;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Depot;
use App\Models\Product;
use App\Models\Order;
use App\Models\DepotItemNote;
use App\Models\Category;
use App\Models\Setting;
use App\Models\DepotItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Smsir\Facades\Smsir as SMS;


class IndexDepot extends BaseComponent
{
	public $product , $count , $action , $slug , $title , $tab = 'depot' , $price = '' , $guest = [] , $category  , $description , $exit_price , $data;
	public $cat , $status , $statuses = [] , $edit = null , $case , $item , $sign , $itemSlug , $itemCount , $itemCategory , $itemStatus , $media , $itemMedia;
	public $enter_price = [] , $depot_item , $new_note;

	public $rent , $track_id , $product_status , $notes = [] , $report  , $manager , $sendedCode , $track_id2;

    use AuthorizesRequests;

	protected $queryString = ['tab','cat','product_status','report','manager'];

    public function render()
    {

		if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin'))
		{
			$this->reset(['manager']);
		} elseif (auth()->user()->hasRole('مدیر محصول') ) {
			$this->manager = true;
		}

		$this->authorize('depot');
		$enter = Depot::orderBy('id','desc')->where('action','enter')->where('type',Depot::PHYSICAL)->when($this->cat, function ($query) {
               return $query->where('category', $this->cat);
            })->when($this->manager,function($q){
			return $q->whereHas('depotItem',function($q){
				return $q->whereHas('product',function($q){
					return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
				});
			});
		})->when($this->product_status, function ($query) {
               return $query->whereHas('depotItem',function ($query){
				   return $query->whereHas('product',function($q){
					 return $q->where('status', $this->product_status);
				});
			   });
            })->when($this->search, function ($query) {
               return $query->whereHas('depotItem',function ($query){
				   return $query->whereHas('product',function($q){
					 return $q->where('title','LIKE', '%'.$this->search.'%');
				});
			   });
            })->paginate($this->perPage);

		$exit = Depot::orderBy('id','desc')->where('action','exit')->where('type',Depot::PHYSICAL)->when($this->cat, function ($query) {
               return $query->where('category', $this->cat);
            })->when($this->manager,function($q){
			return $q->whereHas('depotItem',function($q){
				return $q->whereHas('product',function($q){
					return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
				});
			});
		})->when($this->product_status, function ($query) {
               return $query->whereHas('depotItem',function ($query){
				   return $query->whereHas('product',function($q){
					 return $q->where('status', $this->product_status);
				});
			   });
            })->when($this->search, function ($query) {
               return $query->whereHas('depotItem',function ($query){
				   return $query->whereHas('product',function($q){
					 return $q->where('title','LIKE', '%'.$this->search.'%');
				});
			   });
            })->paginate($this->perPage);
			
		$all = 	DepotItem::orderBy('id','desc')->when($this->manager,function($q){
			return $q->whereHas('product',function($q){
				return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
			});
		})->where('type',Depot::PHYSICAL)->when($this->cat, function ($query) {
               return $query->where('category', $this->cat);
            })->when($this->product_status, function ($query) {
               return $query->whereHas('product',function($q){
					 return $q->where('status', $this->product_status);
				});
            })->when($this->search, function ($query) {
               return $query->whereHas('product',function($q){
					 return $q->where('title','LIKE', '%'.$this->search.'%');
				});
            })->paginate($this->perPage);	

		$products = Product::orderBy('id','desc')->when($this->manager,function($q){
			return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
		})->where('type',Product::TYPE_PHYSICAL)->whereNotIn('id',DepotItem::select('product_id')->get()->toArray())->when($this->cat, function ($query) {
               return $query->where('category_id', $this->cat);
            })->when($this->product_status, function ($query) {
               return $query->where('status', $this->product_status);
            })->search($this->search)->paginate($this->perPage);	


		$this->data = Category::where('parent_id',12)->pluck('title','id')->toArray();

		$this->statuses = Product::getProductsStatus();

        return view('admin.depot.index-depot' , ['enter' => $enter , 'exit' => $exit , 'all' => $all,'products'=>$products])
            ->extends('admin.layouts.admin');
		
		
    }

	public function searchKeyword()
	{
		$this->guest = Product::when($this->manager,function($q){
			return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
		})->where(function($q){
			return $q->where('title','LIKE','%'.$this->product.'%')->orWhere('id',$this->product);
		})->where('type',Product::TYPE_PHYSICAL)->pluck('title','id')->toArray();
	}

	public function setSearch($text)
	{
		$this->product = Product::when($this->manager,function($q){
			return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
		})->findOrFail($text);
		$depotItem = DepotItem::where('product_id',$text)->first();
		if (!is_null($depotItem)) {
			$this->price = $depotItem->depot()->where('type',Depot::PHYSICAL)->where('action',Depot::ENTER)->orderBy('id','desc')->first()->price;
		}
		
		$this->exit_price = $this->product->amount ?? '';
		$this->category = $this->product->category_id ?? '';
		$this->status = $this->product->status;
		$this->media = $this->product->image;
		$this->product = $this->product->id;
		$this->reset(['guest']);
	}

	public function addStoreDepot($name)
    {
		$this->title = $name;
		$this->reset(['product','count','action', 'slug','price']);
		if ($name == 'فرم ورود')
			$this->action = 'enter';
		else 
			$this->action = 'exit';


        $this->resetErrorBag();
        $this->emit('showModel', ['storeDepot']);
    }

	public function delete($id)
	{
		Depot::find($id)->delete();
	}

	public function deletes($id)
	{
		DepotItem::find($id)->delete();
	}

	public function storeDepot()
	{
		if (!is_null($this->track_id) && $this->action == Depot::EXIT)
			$this->track_id2 = (int)$this->track_id - Order::CHANGE_ID;
		$this->validate([
            'product' => ['required', 'exists:products,id','max:200'],
            'count' => ['required', 'integer','between:1,9999999999'],
			'price' => ['nullable' , 'between:0,999999999.999'],
			'exit_price' => ['nullable' , 'between:0,999999999.999'],
			'slug' => ['nullable' , 'string','max:255'],
			'rent' => ['nullable' , 'between:0,999999999.999'],
			'track_id2' => ['nullable' ,'exists:orders,id'],
			'description' => ['nullable' , 'string','max:1000'],
			'status' => ['required','in:'.implode(',',array_keys(Product::getProductsStatus()))],
			'category' => ['required','in:'.implode(',',array_keys($this->data))]
        ],[],[
			'product' => 'محصول',
			'count' => 'تعداد',
			'price' => 'قیمت خرید',
			'exit_price' => 'قیمت فروش',
			'slug' => 'شناسه',
			'rent' => 'کرایه بار',
			'track_id2' => 'کد سفارش',
			'description' => 'توضیحات',
			'status' => 'وضعیت',
			'category' => 'دسته بندی',
		]);


		$check = DepotItem::when($this->manager,function($q){
			return $q->whereHas('product',function($q){
				return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
			});
		})->where('product_id',$this->product)->first();
		if ($this->action == Depot::EXIT && is_null($check))
				return $this->addError('none', 'عدم موجودی در انبار.');
		
		if (!empty($check))
			{
				$check->status =  $this->status; 
				$check->save();	
			} else {
				$product = Product::when($this->manager,function($q){
					return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
				})->findOrFail($this->product);
				$check = DepotItem::create([
					'product_id' => $this->product,
					'category' => $this->category,
					'status' => $this->status,
					'image' => $this->media ?? ''
				]);
			}
		
		
		Depot::create([
			'depot_items_id' => $check->id,
			'count' => $this->count,
			'action' => $this->action,
			'slug' => $this->slug,
			'user_id' => Auth()->user()->id,
			'price' => $this->price + ($this->rent/$this->count),
			'category' => $this->category ?? '' ,
			'exit_price' => $this->exit_price ?? '',
			'description' => $this->description ?? '',
			'image' => $this->media ?? '',
			'rent' => $this->rent ?? '',
			'track_id' => $this->track_id ?? ''
        ]);
		
		$this->reset(['product','count','action','price','edit','exit_price','category','media','rent','track_id','slug','track_id2']);
		$this->emit('hideModel', ['storeDepot']);
        $this->emitNotify('فرم مورد نظر ثبت شد');
		
	}


	public function storeItem()
	{
		if (!is_null($this->track_id) && $this->action == Depot::EXIT)
			$this->track_id2 = (int)$this->track_id - Order::CHANGE_ID;

		$this->validate([
            'count' => ['required', 'integer','between:1,9999999999'],
			'price' => ['nullable' , 'between:0,999999999.999'],
			'exit_price' => ['nullable' , 'between:0,999999999.999'],
			'slug' => ['nullable' , 'string','max:255'],
			'rent' => ['nullable' , 'between:0,999999999.999'],
			'track_id2' => ['nullable' ,'exists:orders,id'],
			'description' => ['nullable' , 'string','max:1000'],
        ],[],[
			'count' => 'تعداد',
			'price' => 'قیمت خرید',
			'exit_price' => 'قیمت فروش',
			'slug' => 'شناسه',
			'rent' => 'کرایه بار',
			'track_id2' => 'کد سفارش',
			'description' => 'توضیحات',
		]);
		
		if($this->case->price <> $this->price)
			$this->case->price = $this->price + $this->rent/$this->count;
		else
			$this->case->price = ($this->price - ((int)$this->case->rent)/$this->case->count) + ((int)$this->rent)/$this->count;

		$this->case->count = $this->count;
		$this->case->exit_price = $this->exit_price;
		$this->case->slug = $this->slug;
		$this->case->rent = $this->rent;
		$this->case->track_id = $this->track_id;
		$this->case->description = $this->description;
		$this->case->save();
		$this->reset(['product','count','action','price','edit','exit_price','category','media','rent','track_id','slug','track_id2']);
		$this->emit('hideModel', ['editDepot']);
        $this->emitNotify('فرم مورد نظر ثبت شد');
		
	}

	public function editCase($id)
	{
		$this->case = Depot::when($this->manager,function($q){
			return $q->whereHas('depotItem',function($q){
				return $q->whereHas('product',function($q){
					return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
				});
			});
		})->find($id);
        $this->resetErrorBag();
		$this->title = $this->case->depotItem->product->title;
		$this->product = $this->case->depotItem->product->id;
		$this->status = $this->case->depotItem->product->status;
		$this->slug =  $this->case->slug;
		$this->category =  $this->case->category;
		$this->count =  $this->case->count;
		$this->price =  $this->case->price;
		$this->exit_price =  $this->case->exit_price;
		$this->action = $this->case->action;
		$this->media = $this->case->image;
		$this->rent = $this->case->rent;
		$this->track_id = $this->case->track_id;
        $this->emit('showModel', ['editDepot']);

		$this->enter_price = $this->case->depotItem->price;
	}

	public function showDetails($id)
	{
		$item = DepotItem::when($this->manager,function($q){
			return $q->whereHas('product',function($q){
				return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
			});
		})->find($id);
		$this->depot_item = $item;
		$this->enter_price = $item->price;
		$this->notes = $item->notes;
		// dd($item->notes);
		$this->emit('showModel', ['showDetails']);
	}

	public function deleteNote($id)
	{
		$item = DepotItemNote::find($id);
		$item->update(['deleted_by' => auth()->id()]);
		$item->delete();
		$this->notes = $item->depot->notes;
	}

	public function storeNewNote()
	{
		$this->validate([
            'new_note' => ['required', 'string' , 'max:4000'],
			
        ],[],[
			'new_note' => 'متن',
		]);
		$note = DepotItemNote::create([
			'depot_item_id' => $this->depot_item->id,
			'text' => $this->new_note,
			'created_by' => auth()->id()
		]);

		$this->reset(['new_note']);
		$this->notes->push($note);
	}

	public function getNumber()
	{
		if (!Session::get("depot-verify",false))
		{
			$this->emit('getNumber');
		}
	}

	public function verify($data)
	{	
		$passwords = explode(',',Setting::where('name', 'depot_password')->first()->value);
		if(in_array($data,$passwords) && !empty($data)) {
			if (!Session::get("depot-verify",false))
			{
				$this->sendedCode = rand(1234,9999);
					
				$this->emit('verify-code');
					
				SMS::sendAdminCode($data,$this->sendedCode);
			}
		} else {
			redirect()->route('admin.dashboard');
		}
		
	}


	public function checkCode($data)
	{
		if(!empty($data) && !empty($this->sendedCode) && $data == $this->sendedCode){
			 Session::put("depot-verify",true);
		} else {
			$this->emitNotify('رمز اشتباه می باشد','warning');
		}
	}
}
        