<?php

namespace App\Http\Controllers\Site\Categories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Window;
use App\Models\Product;
use App\Models\OrderDetail;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
   	use WithPagination;

    public $readyToLoad = false;


	public $groups ,$sub_category, $sub_categories = [] , $ids;
	public $mainImage , $productsCount , $orders , $text , $name , $icon , $picture;

	protected $queryString = [];

	public $active_slide = 'active_slide';
	public $active_slide2 = '';
	public $mainProduct , $windows  , $category , $priceRange = 100 , $is , $level;
	public $most_amount, $filters = [] , $filter = [];
    public function mount($slug)
    {     
		$category = Category::with(['childrenRecursive'])->where('slug',$slug)->firstOrFail();
		$this->category = $category;
        SEOMeta::setTitle(' محصولات '.$category->title);
		SEOMeta::addMeta('robots', 'index,follow', 'name');
		SEOMeta::addMeta('dcterms.rightsHolder', 'کپی‌رایت © - فارس گیمر - کلیه حقوق محفوظ است.', 'name');
        OpenGraph::setTitle($category->title);
        TwitterCard::setTitle($category->title);
        JsonLd::setTitle($category->title);
		$this->mainImage = $category->image;
		$this->name = $category->title;
		$this->icon = $category->icon;
		$this->picture = $category->picture;
		$this->ids = $this->array_value_recursive('id',$this->category->toArray());
		$products = Product::with(['category'])->whereIn('category_id', $this->ids)->where('status',Product::STATUS_AVAILABLE);
		$this->productsCount = $products->count();
		$ordersCount = 0;
		if(is_null($category->parent_id))
			$this->sub_categories = $this->category->toArray()['children_recursive']; 
		
		$this->groups = $this->category->groups()->with('filters')->get()->toArray();
		foreach($products->get() as $product)
		{
			$ordersCount = OrderDetail::where('product_id',$product->id)->where('status','wc-processing')
			->orWhere('status','speed_plus')->count() + $ordersCount;
		}
		$this->orders = ($ordersCount);
		$this->text = $category->description;
		$windows = $this->category->window;
		if(!empty($windows->id))
		{
			$this->mainProduct = Product::where('id',$windows->product_id)->first();
			$this->windows = $windows;
		}
		
    }
	public function levelTest()
	{
		if ($this->level == 0)
			$this->level = 1;
		else
			$this->level = 0;
		$this->activeLink();
	}
	public function apply_filter()
	{
		$this->activeLink();
	}
	public function clear_filter()
	{
		$this->level = 0;
		$this->activeLink();
		$this->priceRange = 100;
		$this->reset(['level','filter']);
	}

	public function priceRanges()
	{
		$this->activeLink();
	}
    public function render()
    {
		$filter = [];
		foreach($this->filter as $key => $value)
			if ($value == true)
				$filter[] = $key;

		if(empty($filter))
			$this->reset(['filter']);	

		if(empty($this->sub_category))
			$this->reset(['sub_category']);		

		if(!is_null($this->sub_category))
			$max = Product::with(['category'])->where('category_id', $this->sub_category)->max('amount');
		else
			$max = Product::with(['category'])->whereIn('category_id', $this->ids)->max('amount');

		$range = ($this->priceRange/100)*($max);
		$products = [];
		$products = Product::with(['category'])->whereIn('category_id', $this->ids)->when($this->filter,function($query) use ($filter){
			return $query->whereHas('filters',function($query) use ($filter){
				$this->activeLink();
				return $query->whereIn('filter_id',$filter);
			});
		})->when($this->sub_category,function($query){
			$this->activeLink();
			return $query->where('category_id',$this->sub_category);
		})->when($this->most_amount,function($query){
			$this->activeLink();
			return $query->orderBy('amount',$this->most_amount);
		})->where(function($query){
			return $this->level == 0 ? $query->where('status','!=',Product::STATUS_DRAFT) : 
				$query->where('status',Product::STATUS_AVAILABLE);
		})->where('amount','>=', 0)->where('amount','<=', $range)->paginate(15);
	 	$link = $products->links('site.components.pagination');
		
        return view('site.categories.category-component',['range' => $range , 'max' => $max,'products' => $products,'link' => $link])
            ->extends('site.layouts.category');
    }

    public function loadMore($pageName)
    {
        $this->prePageComment += 15;
    }
	
	public static function array_value_recursive($key, array $arr){
        $val = array();
        array_walk_recursive($arr, function($v, $k) use($key, &$val){
            if($k == $key) array_push($val, $v);
        });
        return count($val) > 1 ? $val : (array)array_pop($val);
    }

	public function activeLink()
	{
		$this->active_slide = '';
		$this->active_slide2 = 'active_slide';
	}
}
