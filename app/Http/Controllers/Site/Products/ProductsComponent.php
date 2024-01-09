<?php

namespace App\Http\Controllers\Site\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsComponent extends Component
{
    use WithPagination;

    protected $queryString = ['q', 'category', 'sort'];

    public $categories;
    public $category = 'all';
    public $sortable;
    public $sort = 'latest';
    public $q;
    public $perPage = 12;

    public $banners;

    public function mount()
    {
        SEOMeta::setTitle('محصولات - فارس گیمر');
        SEOMeta::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');

        OpenGraph::setTitle('محصولات - فارس گیمر');
        OpenGraph::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');

        TwitterCard::setTitle('محصولات - فارس گیمر');
        TwitterCard::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');

        JsonLd::setTitle('محصولات - فارس گیمر');
        JsonLd::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');

        $this->sortable = ['latest' => 'جدید ترین', 'oldest' => 'قدیمی ترین',
            'price-asc' => 'ارزان ترین', 'price-desc' => 'گران ترین',
            Product::STATUS_AVAILABLE => 'محصولات موجود'
            ];
        $this->categories = Category::with('subCategories')->whereNull('parent_id')->get();

        $this->banners = Setting::whereIn('name', ['products_medium_one', 'products_medium_two'])->get()->pluck('value', 'id');
    }

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::with('category')->fgtal()->orderBy('status')->latest();

        $products = $products->where('status', '!=', Product::STATUS_DRAFT);

        if ($this->category != 'all') {
            $category = Category::where('slug', $this->category)->firstOrFail();
            $products = $products->whereIn('category_id', $category->subCategories()->pluck('id')->push($category->id));
        }

        if ($this->q) {
            $products = $products->where('title', 'LIKE', '%' . $this->q . '%');
        }

        if ($this->sort == Product::STATUS_AVAILABLE) {
            $products->where('status', Product::STATUS_AVAILABLE);
        }

        $products = $products->paginate(20);
        $link = $products->links('site.components.pagination');

        if ($this->sort == 'latest') {
            $products = $products->sortByDesc('created_at');
        } else if ($this->sort == 'oldest') {
            $products = $products->sortBy('created_at');
        } else if ($this->sort == 'price-asc') {
            $products = $products->sortBy('price');
        } else if ($this->sort == 'price-desc') {
            $products = $products->sortByDesc('price');
        }

        return view('site.products.products-component', ['products' => $products, 'link' => $link])
            ->extends('site.layouts.site');
    }
}
