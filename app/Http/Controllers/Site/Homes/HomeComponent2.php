<?php

namespace App\Http\Controllers\Site\Homes;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Livewire\Component;

class HomeComponent2 extends Component
{
    public $headerSlider;
    public $tripleItem;
    public $bestSellers, $fortnite, $physical, $steam;
    public $giftCards;
    public $recentComments;
    public $imageSpecialDiscount;
    public $specialDiscountOne, $specialDiscountTwo, $specialDiscountThree;
    public $articles;
	public $steamGames;

    public function mount()
    {
        SEOMeta::setTitle('فارس گیمر - اولین مرجع رسمی فروش بازی های آنلاین - گران نخرید ! خرید انواع بازی دیجیتال');
        SEOMeta::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');

        OpenGraph::setTitle('فارس گیمر - اولین مرجع رسمی فروش بازی های آنلاین - گران نخرید ! خرید انواع بازی دیجیتال');
        OpenGraph::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');

        TwitterCard::setTitle('فارس گیمر - اولین مرجع رسمی فروش بازی های آنلاین - گران نخرید ! خرید انواع بازی دیجیتال');
        TwitterCard::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');

        JsonLd::setTitle('فارس گیمر - اولین مرجع رسمی فروش بازی های آنلاین - گران نخرید ! خرید انواع بازی دیجیتال');
        JsonLd::setDescription('خرید محصولات فورتنایت - خرید محصولات کالاف دیوتی موبایل - خرید پابجی - ارزان تر از همه جا - خرید ویباکس - خرید ویباکس ارزان -100% مشتریان راضی بوده اند');



		
        $settings = Setting::whereIn('name', [
            'home_slider', 'triple_item', 'best_seller', 'fortnite', 'physical', 'steam', 'gift_carts',
            'image_special_discount', 'slug_one_special_discount', 'slug_two_special_discount', 'slug_three_special_discount','home_article'
        ])->get();

        $this->headerSlider = Setting::where('name', 'home_slider')->orderBy('priority')->pluck('value', 'id');
        $this->tripleItem = $settings->where('name', 'triple_item')->pluck('value', 'id');
        $this->giftCards = $settings->where('name', 'gift_carts')->pluck('value', 'id');

        $bestSellers = $settings->where('name', 'best_seller')->pluck('value')->toArray();
        $fortnite = $settings->where('name', 'fortnite')->pluck('value')->toArray();
        $physical = $settings->where('name', 'physical')->pluck('value')->toArray();
        $steam = $settings->where('name', 'steam')->pluck('value')->toArray();
		$article = $settings->where('name', 'home_article')->pluck('value')->toArray();

        $this->imageSpecialDiscount = $settings->where('name', 'image_special_discount')->first()->value ?? '';

        $products = Product::with(['category', 'currency'])
            ->whereIn('slug', array_merge($bestSellers, $fortnite, $physical, $steam,
                $settings->whereIn('name', ['slug_one_special_discount', 'slug_two_special_discount', 'slug_three_special_discount'])
                    ->pluck('value')->toArray()))->get();

        $this->bestSellers = $products->whereIn('slug', $bestSellers);
        $this->fortnite = $products->whereIn('slug', $fortnite);
        $this->physical = $products->whereIn('slug', $physical);
        $this->steam = $products->whereIn('slug', $steam);
        $this->specialDiscountOne = $products->whereIn('slug', $settings->where('name', 'slug_one_special_discount')->pluck('value'))->first();
        $this->specialDiscountTwo = $products->whereIn('slug', $settings->where('name', 'slug_two_special_discount')->pluck('value'))->first();
        $this->specialDiscountThree = $products->whereIn('slug', $settings->where('name', 'slug_three_special_discount')->pluck('value'))->first();
		$id = Category::where('slug','=','steam-game')->pluck('id')->toArray();
		$this->steamGames = Product::where('category_id',$id[0])->take(12)->get();
        $this->recentComments = Comment::with('user')
            ->latest()
            ->isConfirmed()
            ->where('commentable_type', 'product')
            ->take(12)->get();

			$articles = Article::whereIn('slug', $article)->get();
        // $this->articles = Article::latest()->take(12)->get();
			$this->articles = $articles->whereIn('slug',$article);
    }

    public function render()
    {
        return view('site.homes.home2')
            ->extends('site.layouts.site3');
    }
}
