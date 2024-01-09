<?php

namespace App\Http\Controllers\Admin\Depot;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Depot;
use App\Models\Product;
use App\Models\ProductLicense;
use App\Models\Category;
use App\Models\DepotItem;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Smsir\Facades\Smsir as SMS;

class IndexDigitalDepot extends BaseComponent
{
	public $product , $count , $action , $licenses  , $title , $tab = 'depot' , $price = '' , $guest = [] , $category  , $description , $exit_price ;
	public $cat , $status , $statuses = [] , $edit = null , $case , $item , $sign , $itemSlug , $itemCount , $itemCategory , $itemStatus , $media , $itemMedia;
	public $enter_price = [] , $product_license = [] , $product_license_deleted = [] , $product_license_used = [];

	public $rent , $track_id , $product_status , $notes = [] , $report , $count2 = 0;

	public $license_tab = 'not_used' , $product_name , $manager , $sendedCode , $track_id2 , $order_id;
    use AuthorizesRequests;

	protected $queryString = ['tab','cat','product_status','report','manager','order_id'];


    public function render()
    {
		
		$this->authorize('depot');
		
		if (!auth()->user()->hasRole('مدیر محصول') || auth()->user()->hasRole('super_admin'))
		{
			$this->reset(['manager']);
		} elseif (auth()->user()->hasRole('مدیر محصول') ) {
			$this->manager = true;
		}


		$enter = Depot::orderBy('id','desc')->where('action','enter')->where('type',Depot::DIGITAL)->when($this->cat, function ($query) {
               return $query->where('category', $this->cat);
            })->when($this->manager,function($q){
			return $q->whereHas('depotItem',function($q){
				return $q->whereHas('product',function($q){
					return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
				});
			});
		})->when($this->product_status, function ($query) {
               return $query->whereHas('depotItem',function ($query){
				   return $query->whereHas('product',function($query){
					 return $query->where('status', $this->product_status);
				});
			   });
            })->when($this->search, function ($query) {
               return $query->whereHas('depotItem',function ($query){
				   return $query->whereHas('product',function($q){
					 return $q->where('title','LIKE', '%'.$this->search.'%');
				});
			   });
            })->paginate($this->perPage);

		$exit = Depot::orderBy('id','desc')->when($this->manager,function($q){
			return $q->whereHas('depotItem',function($q){
				return $q->whereHas('product',function($q){
					return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
				});
			});
		})->when($this->order_id,function($q){
			return $q->where('track_id',$this->order_id);
		})->where('action','exit')->where('type',Depot::DIGITAL)->when($this->cat, function ($query) {
               return $query->where('category', $this->cat);
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
		})->where('type',Depot::DIGITAL)->when($this->cat, function ($query) {
               return $query->where('category', $this->cat);
            })->when($this->product_status, function ($query) {
               return $query->whereHas('product',function($query){
					 return $query->where('status', $this->product_status);
				});
            })->when($this->search, function ($query) {
               return $query->whereHas('product',function($q){
					 return $q->where('title','LIKE', '%'.$this->search.'%');
				});
            })->paginate($this->perPage);	

		$products = Product::orderBy('id','desc')->when($this->manager,function($q){
			return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
		})->where(function($q){
			return $q->where('type',Product::TYPE_INSTANT_DELIVERY)->orWhere('type',Product::TYPE_NORMAL_DELIVERY);
		})->whereNotIn('id',DepotItem::select('product_id')->get()->toArray())->when($this->cat, function ($query) {
               return $query->where('category_id', $this->cat);
            })->when($this->product_status, function ($query) {
               return $query->where('status', $this->product_status);
            })->search($this->search)->paginate($this->perPage);	


		$this->data = Category::where('parent_id','!=',12)->pluck('title','id')->toArray();

		$this->statuses = Product::getProductsStatus();

        return view('admin.depot.index-digital-depot' , ['enter' => $enter , 'exit' => $exit , 'all' => $all,'products'=>$products])
            ->extends('admin.layouts.admin');
		
		
    }

	public function searchKeyword()
	{
		$this->guest = Product::when($this->manager,function($q){
			return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
		})->where(function($q){
			return $q->where('title','LIKE','%'.$this->product.'%')->orWhere('id',$this->product);
		})->where(function($q){
			return $q->where('type',Product::TYPE_INSTANT_DELIVERY)->orWhere('type',Product::TYPE_NORMAL_DELIVERY);
		})->pluck('title','id')->toArray();
	}

	public function setSearch($text)
	{
		$this->price = null;
		$this->product = Product::when($this->manager,function($q){
			return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
		})->findOrFail($text);
		$depotItem = DepotItem::where('product_id',$text)->first();
		if (!is_null($depotItem)) {
			$isset_item = $depotItem->depot()->where('type',Depot::DIGITAL)->where('action',Depot::ENTER)->orderBy('id','desc')->first();
			// dd($isset_item);
			if (!empty($isset_item)) {
				$this->price = $isset_item->price;
			}
		}
		$this->reset(['product_license']);
		$this->exit_price = $this->product->price ?? '';
		$this->category = $this->product->category_id ?? '';
		$this->status = $this->product->status;
		$this->media = $this->product->image;
		$this->product = $this->product->id;
		$this->reset(['guest']);
	}

	public function addStoreDepot($name)
    {
		$this->title = $name;
		$this->reset(['product','action','price']);
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
		$this->validate([
            'product' => ['required', 'exists:products,id','max:200'],
			'price' => ['nullable' , 'between:0,999999999.999'],
			'exit_price' => ['nullable' , 'between:0,999999999.999'],
		
			'description' => ['nullable' , 'string','max:1000'],
			'status' => ['required','in:'.implode(',',array_keys(Product::getProductsStatus()))],
			'category' => ['required','in:'.implode(',',array_keys($this->data))],
			'licenses' => ['nullable', 'string'],
			'count2' => ['nullable','between:1,999999999']
        ],[],[
			'product' => 'محصول',
			'price' => 'قیمت خرید',
			'exit_price' => 'قیمت فروش',
			
			'description' => 'توضیحات',
			'status' => 'وضعیت',
			'category' => 'دسته بندی',
			'licenses' => 'لاینسیس',
			'count2' => 'تعداد',
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
					'image' => $this->media ?? '',
					'type' => Depot::DIGITAL
				]);
			}
			
		$licenses = explode(',', $this->licenses);
		
		$count = 0;
		
                if ($this->action == Depot::ENTER) {
					foreach ($licenses as $item) {
						$license = new ProductLicense(['license' => $item]);
						$check->product->licenses()->save($license);
                	}
					$count = count($licenses);
				} elseif ($this->action == Depot::EXIT) {
					$licensesCode = $check->product->licenses()->isNotUsed()->take($this->count2)->get();
					$count = $this->count2;
					
					if (sizeof($licensesCode) != $count) {
						return $this->addError('count2','موجودی لایسنس کافی نمی باشد');
					} else {
						foreach ($licensesCode as $license) {
							$license->is_used = 1;
							$license->save();
							$licenses[] = $license->license;
						}
						$this->product_license = $licenses;
					}
				
				}
            
			
		Depot::create([
			'depot_items_id' => $check->id,
			'count' => $count,
			'action' => $this->action,
			'user_id' => auth()->id(),
			'price' => $this->price ,
			'category' => $this->category ?? '' ,
			'exit_price' => $this->exit_price ?? '',
			'description' => $this->description,
			'image' => $this->media ?? '',
			'track_id' => $this->track_id ?? '',
			'type' => Depot::DIGITAL,
			'licenses' => implode(',',$this->product_license)
        ]);
		if ($this->action == Depot::ENTER){
			$this->reset(['product','count','action','price','edit','exit_price','category','media','rent','track_id','track_id2','licenses','product_license','count2']);
			$this->emit('hideModel', ['storeDepot']);
		} else {
			$this->reset(['product','count','price','edit','exit_price','category','media','rent','track_id','track_id2','licenses','count2']);
		}
		
		 
        $this->emitNotify('فرم مورد نظر ثبت شد');
		
	}


	public function storeItem()
	{

		$this->validate([
			'price' => ['nullable' , 'between:0,999999999.999'],
			'exit_price' => ['nullable' , 'between:0,999999999.999'],
			'count' => ['required', 'integer','between:1,9999999999'],
			
			'description' => ['nullable','string','max:1000'],
        ],[],[
			'price' => 'قیمت خرید',
			'exit_price' => 'قیمت فروش',
			
			'description' => 'توضیحات',
			'count' => 'تعداد',
		]);

		$this->case->count = $this->count;
		$this->case->exit_price = $this->exit_price;
		$this->case->track_id = $this->track_id;
		$this->case->description = $this->description;
		$this->case->save();
		$this->reset(['product','count','action','price','edit','exit_price','category','media','rent','track_id','track_id2']);
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
		})->findOrFail($id);

        $this->resetErrorBag();
		$this->title = $this->case->depotItem->product->title;
		$this->product = $this->case->depotItem->product->id;
		$this->status = $this->case->depotItem->product->status;
		
		$this->category =  $this->case->category;
		$this->count =  $this->case->count;
		$this->price =  $this->case->price;
		$this->exit_price =  $this->case->exit_price;
		$this->action = $this->case->action;
		$this->media = $this->case->image;
		
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
		$this->enter_price = $item->price;
		$this->notes = $item->depot()->latest('id')->select('description','updated_at')->get();
		$this->product_license = $item->product->licenses()->latest('id')->isNotUsed()->pluck('license','id')->toArray();
		$this->product_name = $item->product->title;
		$this->emit('showModel', ['showDetails']);
	
	}

	public function deleteLicense($id)
    {
		
        ProductLicense::when($this->manager,function($q){
			return $q->whereHas('product',function($q){
				return $q->where('manager_mobile', 'LIKE', '%'.auth()->user()->mobile.'%');
			});
		})->findOrFail($id)->delete();
		unset( $this->product_license[$id]);
       
		
        $this->emitNotify('لاینسیس با موفقیت حذف شد');
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
		// $passwords = explode(',',Setting::where('name', 'depot_password')->first()->value);
		$passwords = ['09307954349','09010235494'];
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
        