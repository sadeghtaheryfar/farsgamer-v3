<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Copy;
use App\Models\ProductLicense;
use App\Models\CategoryParameter;
use App\Models\CategoryParameterProduct;
use App\Traits\Admin\FormBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Models\PasswordRequest;
use App\Http\Controllers\Smsir\Facades\Smsir as SMS;

class StoreProduct extends BaseComponent
{
    use AuthorizesRequests;
    use FormBuilder;

	public $sendedCode;
    public $title, $slug, $short_description, $description, $currency_id, $amount, $partner_amount, $quantity, $image,
        $media, $score, $type, $status, $delivery_time, $category_id ,$detail_display,
        $manager_mobile, $lottery,
        $discount_type, $discount_amount, $discount_starts_at, $discount_expires_at,$seo_questions,
        $seo_keywords, $seo_description, $licenses, $product_license = [] , $buy_amount = 0 , $const_price, $telegram_bot_view = 0;
		public $parameters = [],$parametersValue = [] , $hidden = true  , $filter_groups = [] , $selectedFilters = [] , $manager_sms = 0 , $telegram_bot = false , $fgtal = false;

    public function mount($action, $id = null)
    {
        if ($action == 'create') {
            $this->create();
        } elseif ($action == 'edit') {
            $this->edit($id);
        } else {
            abort(404);
        }

        $this->data['currency_id'] = Currency::all()->pluck('title', 'id');
        $this->data['type'] = Product::getProductsType();
        $this->data['status'] = Product::getProductsStatus();
        $this->data['category_id'] = Category::whereNotNull('parent_id')->pluck('title', 'id');
        $this->data['discount_type'] = Product::getProductsDiscount();
		
		$this->data['detail_display'] = [
			'0' => 'نمایش توضیحات کوتاه',
			'1' => 'نمایش ویژگی ها',
			'2' => 'نمایش هر دو',
			'3' => 'هیچکدام'
		];
    }

    public function render()
    {
		if (isset($this->category_id))
			$this->filter_groups = Category::find($this->category_id)->groups()->with(['filters'])->get();
	
        return view('admin.products.store-product')
            ->extends('admin.layouts.admin');
    }

    public function create()
    {
        $this->authorize('create_products');

        $this->setMode(self::MODE_CREATE);
    }


	public function checkCode($data)
	{
		if(!empty($data) && !empty($this->sendedCode) && $data == $this->sendedCode){
			$this->hidden = false;
			$this->emitNotify('هش با موفقیت غیرفعال شد');
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => null,
				'status' => 'کد ارسال شده صحیح',
				'value' => $data,
			]);
		} else {
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => null,
				'status' => 'کد ارسال شده اشتباه',
				'value' => $data,
			]);
			$this->emitNotify('کد وارد شده اشتباه می باشد','warning');
		}
	}

	public function checkPassword($data)
	{
		$passwords = ['09010235494','09903681680','09931788937','09336332901'];
		if(in_array($data,$passwords) && !empty($data)) {
			$this->sendedCode = rand(123459,9999999);
			$this->emit('verify-code');
			SMS::sendAdminCode($data,$this->sendedCode);
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => null,
				'status' => 'رمز صحیح',
				'value' => $data,
			]);
		} else {
			PasswordRequest::create([
				'user_id' => auth()->id(),
				'order_id' => null,
				'status' => 'رمز اشتباه',
				'value' => $data,
			]);
			$this->emitNotify('گذرواژه وارد شده اشتباه می باشد','warning');
		}
	}

    public function store()
    {
        $this->authorize('create_products');

		
        $this->saveInDatabase(new Product());

        $this->emitNotify('محصول با موفقیت ثبت شد');
        $this->resetInputs();
    }

    public function edit($id)
    {
		
        $this->authorize('edit_products');

        $this->setMode(self::MODE_UPDATE);
        if (auth()->user()->hasPermissionTo('product_manager')) {
            $this->model = Product::where('manager_mobile', 'LIKE', '%' . auth()->user()->mobile . '%')
                ->where('id', $id)
                ->firstOrFail();
        } else {
            $this->model = Product::findOrFail($id);
        }
		
		if ($this->model->category->id == 5 || $this->model->category->parent_id == 5)
		{
			$this->authorize('gift_cards');
		}
        $this->title = $this->model->title;
        $this->slug = $this->model->slug;
        $this->short_description = $this->model->short_description;
        $this->description = $this->model->description;
        $this->currency_id = $this->model->currency_id;
        $this->amount = $this->model->amount;
        $this->partner_amount = $this->model->partner_amount;
        $this->quantity = $this->model->quantity;
        $this->image = $this->model->image;
        $this->media = $this->model->media;
        $this->score = $this->model->score;
        $this->type = $this->model->type;
        $this->status = $this->model->status;
        $this->form = $this->model->form;
        $this->delivery_time = $this->model->delivery_time;
        $this->category_id = $this->model->category_id;
		$this->detail_display = $this->model->detail_display;
		$this->lottery = $this->model->lottery;
		$this->buy_amount = $this->model->buy_amount;
		$this->const_price = $this->model->const_price;
        //manager
        $this->manager_mobile = $this->model->manager_mobile;
		$this->manager_sms = $this->model->manager_sms;
        //discount
        $this->discount_type = $this->model->discount_type;
        $this->discount_amount = $this->model->discount_amount;
        $this->discount_starts_at = $this->model->discount_starts_at;
        $this->discount_expires_at = $this->model->discount_expires_at;
        //seo
        $this->seo_keywords = $this->model->seo_keywords;
        $this->seo_description = $this->model->seo_description;
		$this->seo_questions = $this->model->seo_questions;
        //relations
        $this->product_license = $this->model->licenses()->isNotUsed()->pluck('license', 'id');

 		$this->selectedFilters = $this->model->filters->pluck('pivot', 'group_id')->toArray();
		
		$this->telegram_bot = $this->model->telegram_bot;
		$this->telegram_bot_view = $this->model->telegram_bot_view;
		$this->fgtal = $this->model->fgtal;

    }

	

    public function update()
    {
        $this->authorize('edit_products');
		if ($this->model->category->id == 5 || $this->model->category->parent_id == 5)
		{
			$this->authorize('gift_cards');
		}

        $this->saveInDatabase($this->model);
		
					

        $this->emitNotify('محصول با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Product $product )
    {
        $this->short_description = $this->emptyToNull($this->short_description);
        $this->description = $this->emptyToNull($this->description);
        $this->currency_id = $this->emptyToNull($this->currency_id);
        $this->quantity = $this->emptyToNull($this->quantity);
        $this->manager_mobile = $this->emptyToNull($this->manager_mobile);
        $this->discount_starts_at = $this->emptyToNull($this->discount_starts_at);
        $this->discount_expires_at = $this->emptyToNull($this->discount_expires_at);
        $this->media = $this->emptyToNull($this->media);
        $this->licenses = $this->emptyToNull($this->licenses);
        $this->validate(
            [
                'title' => ['required', 'string', 'max:250'],
                'slug' => ['required', 'string', 'unique:products,slug,' . ($this->model->id ?? 0)],
                'short_description' => ['nullable', 'string', 'max:65500'],
                'description' => ['nullable', 'string', 'max:4000000000'],
                'currency_id' => ['nullable', 'exists:currencies,id'],
                'amount' => ['required', 'between:0,999999999.999'],
				'buy_amount' => ['required', 'between:0,999999999.999'],
				'const_price' => ['required', 'boolean'],
                'partner_amount' => ['required', 'between:0,999999999.999'],
                'quantity' => ['nullable', 'integer', 'min:0', 'max:65000'],
                'image' => ['required', 'string', 'max:250'],
                'media' => ['nullable', 'string', 'max:6500'],
                'score' => ['required', 'integer', 'min:0', 'max:65000'],
                'type' => ['required'],
                'status' => ['required', 'in:' . Product::STATUS_DRAFT . ',' . Product::STATUS_AVAILABLE . ',' . Product::STATUS_UNAVAILABLE . ',' . Product::STATUS_COMING_SOON.','.Product::STATUS_TOWARDS_THE_END],
                'form' => ['present', 'array'],
                'delivery_time' => ['required', 'integer', 'min:0', 'max:1000000'],
                'category_id' => ['required', 'exists:categories,id'],
                //manager
                'manager_mobile' => ['nullable', 'string', 'max:250'],
				'manager_sms' => ['boolean'],
                //discount
                'discount_type' => ['required', 'in:' . Product::DISCOUNT_FIXED . ',' . Product::DISCOUNT_PERCENTAGE],
                'discount_amount' => ['required', 'integer', 'min:0', 'max:1500000'],
                'discount_starts_at' => ['nullable', 'date'],
                'discount_expires_at' => ['nullable', 'date'],
                //seo
                'seo_keywords' => ['required', 'string', 'max:65500'],
                'seo_description' => ['required', 'string', 'max:250'],
				
                //relations
                'licenses' => ['nullable', 'string'],

				'detail_display' => ['required'],
				'lottery' => ['required','integer','between:0,1000000000'],
				'telegram_bot' => ['required','boolean'],
				'fgtal' => ['required','boolean'],
				'telegram_bot_view' => ['required','integer']
            ],
            [],
            [
                'title' => 'عنوان',
                'slug' => 'آدرس',
                'short_description' => 'توضیحات کوتاه',
                'description' => 'توضیحات',
                'currency_id' => 'واحد پول',
                'amount' => 'قیمت',
				'buy_amount' => 'قیمت خرید',
				'const_price' => 'قیمت ثابت',
                'partner_amount' => 'قیمت همکاری',
                'quantity' => 'تعداد',
                'image' => 'تصویر',
                'media' => 'تصاویر',
                'score' => 'امتیاز',
                'type' => 'نوع',
                'status' => 'وضعیت',
                'form' => 'فرم',
                'delivery_time' => 'زمان تحویل',
                'category_id' => 'دسته بندی',
                //manager
                'manager_mobile' => 'موبایل مدیران',
                //discount
                'discount_type' => 'نوع تخفیف',
                'discount_amount' => 'مقدار تخفیف',
                'discount_starts_at' => 'شروع تخفیف',
                'discount_expires_at' => 'پایان تخفیف',
                //seo
                'seo_keywords' => 'کلمات کلیدی سئو',
                'seo_description' => 'توضیحات سئو',
				'seo_questions' => 'سوالات سئو',
                //relations
                'licenses' => 'لاینسیس',
				'detail_display' => 'نمایش جزئیات',
				'lottery' => 'شانس قرعه کشی',
				'manager_sms' => 'ارسال اس ام اس برای مدیر محصول',
				'telegram_bot' => 'نمایش در ربات تلگرام',
				'telegram_bot_view' => 'شماره نمایش در ربات تلگرام',
				'fgtal' => 'fgtal'
            ]
        );
        DB::transaction(function () use ($product) {
            $product->title = $this->title;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->currency_id = $this->currency_id;
            $product->amount = $this->amount;
			$product->buy_amount = $this->buy_amount;
			$product->const_price = $this->const_price;
            $product->partner_amount = $this->partner_amount;
            $product->quantity = $this->quantity;
            $product->image = $this->image;
            $product->media = $this->media;
            $product->score = $this->score;
            $product->type = $this->type;
            $product->status = $this->status;
            $product->form = json_encode($this->form);
            $product->delivery_time = $this->delivery_time;
            $product->category_id = $this->category_id;
			$product->detail_display = $this->detail_display;
            //manager
            $product->manager_mobile = $this->manager_mobile;
			$product->manager_sms = $this->manager_sms;
            //discount
            $product->discount_type = $this->discount_type;
            $product->discount_amount = $this->discount_amount;
            $product->discount_starts_at = $this->discount_starts_at;
            $product->discount_expires_at = $this->discount_expires_at;
            //seo
            $product->seo_keywords = $this->seo_keywords;
            $product->seo_description = $this->seo_description;
			$product->seo_questions = $this->seo_questions;
			$product->lottery = $this->lottery;
			$product->telegram_bot = $this->telegram_bot;
			$product->telegram_bot_view = $this->telegram_bot_view;		
			$product->fgtal = $this->fgtal;		
            $product->save();
            if (!is_null($this->licenses)) {
                foreach (explode(',', $this->licenses) as $item) {
                    $license = new ProductLicense([
                        'license' => $item,
                    ]);
                    $product->licenses()->save($license);
                }
            }
        });
		

		$filters = [];
		if (!is_null($this->selectedFilters)) {
			foreach ($this->selectedFilters as $key => $item) {
               if(!empty($item['filter_id'])){
				    $filters[] = [
						'product_id' =>  $product->id,
						'filter_id' =>  $item['filter_id'],
						'group_id' => $key
					]; 
			   }
            }
		}

		if($this->mode == self::MODE_UPDATE)
			$product->filters()->sync($filters);
		elseif($this->mode == self::MODE_CREATE)
			$product->filters()->attach($filters);	


		return $product->id;
    }

    public function delete($id)
    {
        $this->authorize('delete_products');

        Product::findOrFail($id)->delete();

        $this->emitNotify('محصول با موفقیت حذف شد');
    }

    public function deleteLicense($id)
    {
        ProductLicense::findOrFail($id)->delete();

        $this->product_license = $this->product_license->forget($id);

        $this->emitNotify('لاینسیس با موفقیت حذف شد');
    }

    public function resetInputs()
    {
        $this->reset(['title', 'slug', 'short_description', 'description', 'currency_id', 'amount',
            'partner_amount', 'quantity', 'image', 'media', 'score', 'type', 'status', 'delivery_time', 'category_id',
            'manager_mobile', 'discount_type', 'discount_amount', 'discount_starts_at', 'discount_expires_at', 'seo_keywords',
            'seo_description', 'licenses', 'product_license','lottery','buy_amount','const_price','fgtal']);
    }

	public function copyLicenses($text = null)
	{
		$copy = new Copy();
		$copy->user_id = Auth()->user()->id;
		$copy->product_id = $this->model->id;
		$copy->text = $text;
		$copy->save();
	}

	public function copyProduct()
	{
		$this->slug = $this->slug.'-copy';
		$this->title = $this->title.'-copy';
		$this->licenses = null;
		$id = $this->saveInDatabase(new Product());
		return redirect()->route('admin.products.store',['action'=>'edit', 'id' => $id]);
	}
}