<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Admin\BaseComponent;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductLicense;
use App\Traits\Admin\FormBuilder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class ProductComponent extends BaseComponent
{
    use AuthorizesRequests;
    use FormBuilder;

    public $category;
    public $selectedCategory;

    public $title;
    public $slug;
    public $short_description;
    public $description;
    public $currency_id;
    public $amount;
    public $partner_amount;
    public $quantity;
    public $image;
    public $media;
    public $score;
    public $type;
    public $status;
    public $delivery_time;
    public $category_id;
    //manager
    public $manager_mobile;
    //discount
    public $discount_type;
    public $discount_amount;
    public $discount_starts_at;
    public $discount_expires_at;
    //seo
    public $seo_keywords;
    public $seo_description;
    //relations
    public $licenses;
    public $product_license = [];

    public function mount()
    {
        $this->category = \App\Models\Category::whereNull('parent_id')->get()->pluck('title', 'id');

        $this->data['currency_id'] = Currency::all()->pluck('title', 'id');
        $this->data['type'] = Product::getProductsType();
        $this->data['status'] = Product::getProductsStatus();
        $this->data['category_id'] = Category::whereNotNull('parent_id')->pluck('title', 'id');
        $this->data['discount_type'] = Product::getProductsDiscount();
    }

    public function render()
    {
        $this->authorize('show_products');

        $products = Product::latest()
            ->with(['currency'])
            ->when($this->selectedCategory, function ($query){
                $categoriesId = Category::where('parent_id', $this->selectedCategory)->get()->pluck('id');
                return $query->whereIn('category_id', $categoriesId);
            })
            ->search($this->search)
            ->paginate($this->perPage);

        return view('admin.products.product-component', ['products' => $products])
            ->extends('admin.layouts.admin');
    }

    protected function rules()
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

        return [
            'title' => ['required', 'string', 'max:250'],
            'slug' => ['required', 'string', 'unique:products,id,' . ($this->model->id ?? 0)],
            'short_description' => ['nullable', 'string', 'max:65500'],
            'description' => ['nullable', 'string', 'max:4000000000'],
            'currency_id' => ['nullable', 'exists:currencies,id'],
            'amount' => ['required', 'between:0,999999999.999'],
            'partner_amount' => ['required', 'between:0,999999999.999'],
            'quantity' => ['nullable', 'integer', 'min:0', 'max:65000'],
            'image' => ['required', 'string', 'max:250'],
            'media' => ['nullable', 'string', 'max:6500'],
            'score' => ['required', 'integer', 'min:0', 'max:65000'],
            'type' => ['required', 'in:' . Product::TYPE_INSTANT_DELIVERY . ',' . Product::TYPE_NORMAL_DELIVERY],
            'status' => ['required', 'in:' . Product::STATUS_DRAFT . ',' . Product::STATUS_AVAILABLE . ',' . Product::STATUS_UNAVAILABLE . ',' . Product::STATUS_COMING_SOON],
            'form' => ['present', 'array'],
            'delivery_time' => ['required', 'integer', 'min:0', 'max:1000000'],
            'category_id' => ['required', 'exists:categories,id'],
            //manager
            'manager_mobile' => ['nullable', 'string', 'max:250'],
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
        ];
    }

    public function create()
    {
        $this->authorize('create_products');

        $this->setMode(self::MODE_CREATE);
    }

    public function store()
    {
        $this->authorize('create_products');

        $this->validate();

        $this->saveInDatabase(new Product());

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('محصول با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $this->authorize('edit_products');

        $this->setMode(self::MODE_UPDATE);
        $this->model = Product::find($id);

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
        //manager
        $this->manager_mobile = $this->model->manager_mobile;
        //discount
        $this->discount_type = $this->model->discount_type;
        $this->discount_amount = $this->model->discount_amount;
        $this->discount_starts_at = $this->model->discount_starts_at;
        $this->discount_expires_at = $this->model->discount_expires_at;
        //seo
        $this->seo_keywords = $this->model->seo_keywords;
        $this->seo_description = $this->model->seo_description;
        //relations
        $this->product_license = $this->model->licenses()->pluck('license', 'id');
    }

    public function update()
    {
        $this->authorize('edit_products');

        $this->validate();

        $this->saveInDatabase($this->model);

        $this->setMode(self::MODE_NONE);
        $this->emitNotify('محصول با موفقیت ویرایش شد');
    }

    private function saveInDatabase(Product $product)
    {
        DB::transaction(function () use ($product) {
            $product->title = $this->title;
            $product->slug = $this->slug;
            $product->short_description = $this->short_description;
            $product->description = $this->description;
            $product->currency_id = $this->currency_id;
            $product->amount = $this->amount;
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
            //manager
            $product->manager_mobile = $this->manager_mobile;
            //discount
            $product->discount_type = $this->discount_type;
            $product->discount_amount = $this->discount_amount;
            $product->discount_starts_at = $this->discount_starts_at;
            $product->discount_expires_at = $this->discount_expires_at;
            //seo
            $product->seo_keywords = $this->seo_keywords;
            $product->seo_description = $this->seo_description;
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
            'seo_description', 'licenses', 'product_license']);
    }
}