<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Setting;
use App\Models\Window;
use App\Models\Category;
use App\Models\Product;
use App\Models\WindowSlider;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StoreWindow extends BaseComponent
{
    use AuthorizesRequests;

    public $slug,$description,$slider,$product_id,$content,$mode,$parent_id , $window_slider = [] , $slider_logo,$slider_title ,$priority ,
	$action , $new_case , $slider_products , $idcase  , $category_id = [];

    public function mount($action, $window = null)
    {
		$this->authorize('show_settings');
        if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($window);
        } else {
            abort(404);
        }
		$this->category_id = Category::pluck('title', 'id');
		$this->action = $action;
	
    }

    public function render()
    {
		$products_id = [];
		if	(isset($this->parent_id)){
			$category = Category::with(['childrenRecursive'])->findOrFail($this->parent_id);
			$ids = $this->array_value_recursive('id',$category->toArray());
			
			$products_id = Product::whereIn('category_id',$ids)->where('amount','>',0)->pluck('title', 'id');
		}
		
        return view('admin.settings.store-window',['products_id' => $products_id])
            ->extends('admin.layouts.admin');
    }
	public  function array_value_recursive($key, array $arr){
        $val = array();
        array_walk_recursive($arr, function($v, $k) use($key, &$val){
            if($k == $key) array_push($val, $v);
        });
        return count($val) > 1 ? $val : (array)array_pop($val);
    }

    public function create()
    {
        $this->authorize('create_settings');

		$this->mode = self::MODE_CREATE;

		$last_id = Window::latest('created_at')->first()->id;
		$this->new_case = $last_id + 1;
		$this->window_slider = WindowSlider::where('window_id','wating')->get();
		
    }

    public function store()
    {
        $this->authorize('create_settings');

        $this->saveInDatabase(new Window());
		$this->reset(['slug','description','slider','parent_id','product_id']);
        $this->emitNotify('قانون با موفقیت ثبت شد');
    }

    public function edit($window)
    {
		
        $this->authorize('edit_settings');
	
	
        $this->mode = self::MODE_UPDATE;
		
        $this->model = Window::findOrFail($window);
		
        $this->slug = $this->model->slug;
		$this->description = $this->model->description;
		$this->parent_id = $this->model->category->id;
		$this->slider = $this->model->slider;
		$this->product_id = $this->model->product->id;
		$this->window_slider = $this->model->sliders;
		
    }

    public function update()
    {
        $this->authorize('edit_settings');

        $this->saveInDatabase($this->model);

        $this->emitNotify('اطلاعات با موفقیت ویرایش شد');
    }

    public function saveInDatabase(Window $Window)
    {
        $this->validate(
            [
                'slug' => ['required', 'string', 'unique:windows,slug,' . ($this->model->id ?? 0)],
				'parent_id' => ['required','unique:windows,category_id,' . ($this->model->id ?? 0)],
				'description' => ['nullable', 'string'],
				'slider' => ['nullable', 'string'],
				'product_id' => ['required','exists:products,id']
            ],
            [],
            [
                'slug' => 'نام ',
				'description' => 'توضیحات ',
				'slider' => 'اسایدر',
				'product_id' => 'محصول اصلی'
            ]

        );

        $Window->slug = $this->slug;
        $Window->description = $this->description;
		$Window->category_id = $this->parent_id;
		$Window->slider = $this->slider;
		$Window->product_id = $this->product_id;
        $Window->save();

		if ($this->action == 'create')
		{
			WindowSlider::where('window_id', 'wating')->update(['window_id' =>$Window->id ]);
		}
    }

    public function resetInputs()
    {
        $this->reset(['slug','description','category_id','slider','product_id','logo']);
    }


	public function delete($id)
    {
		$this->authorize('delete_settings');
        $this->authorize('delete_settings');
        WindowSlider::findOrFail($id)->delete();
		
        $this->emitNotify('تنظیمات با موفقیت حذف شد');
    }

	public function editItem($id)
	{
		$case = WindowSlider::find($id);
		
		$this->idcase = $id;
		$this->slider_title = $case->title;
		$this->slider_logo =  $case->logo;
		$this->slider_products =  $case->products;
		$this->priority = $case->priority;
		$this->emit('showModel', ['imageWithUrlEdit']);
	}
	 public function addImageWithUrl($name)
    {
        // $this->setting_name = $name;
        $this->resetErrorBag();
        $this->reset(['slider_title','slider_logo','priority']);
        $this->emit('showModel', ['imageWithUrl']);
    }

	public function storeWindowSlider()
	{
		$this->validate([
            'slider_title' => ['required', 'string'],
            'slider_logo' => ['nullable'],
			'slider_products' => ['required']
        ]);
		
		 WindowSlider::create([
            'title' => $this->slider_title,
            'logo' => $this->slider_logo,
			'window_id' => isset($this->model->id) ? $this->model->id : 'wating',
			'priority' => $this->priority,
			'products' =>  $this->slider_products
        ]);

		$this->window_slider[] = WindowSlider::latest('created_at')->first();


        $this->emit('hideModel', ['imageWithUrl']);
        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
	}

	public function editImageWithUrl()
    {
        $this->validate([
            'slider_title' => ['required', 'string'],
            'slider_logo' => ['nullable'],
			'slider_products' => ['required']
        ]);

		$case = WindowSlider::find($this->idcase);
		
		$case->title = $this->slider_title;
		$case->logo = $this->slider_logo;
		$case->priority = $this->priority;
		$case->products = $this->slider_products;
		$case->save();
      

        $this->emit('hideModel', ['imageWithUrlEdit']);
        $this->emitNotify('تنظیمات با موفقیت بروزرسانی شد');
    }
}