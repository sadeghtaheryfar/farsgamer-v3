<?php

use Hekmatinasser\Verta\Laravel\VertaServiceProvider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/auth', \App\Http\Controllers\Site\Auth\AuthComponent::class)->name('auth');
});

Route::get('/streams/{token}', \App\Http\Controllers\Site\Sidebar::class)->name('streams');

Route::get('/', \App\Http\Controllers\Site\Homes\HomeComponent::class)->name('home');
Route::get('/2', \App\Http\Controllers\Site\Homes\HomeComponent2::class)->name('home2');

Route::get('/shop', \App\Http\Controllers\Site\Products\ProductsComponent::class)->name('products');
Route::get('/products/{slug}', \App\Http\Controllers\Site\Products\ProductComponent::class)->name('products.show');

Route::get('/faqs', \App\Http\Controllers\Site\Settings\OrdersDetailComponent::class)->name('faqs');
Route::get('/lottery', \App\Http\Controllers\Site\Settings\LotteryComponent::class)->name('lottery');
Route::get('/faq', \App\Http\Controllers\Site\Settings\FaqsComponent::class)->name('faq');
Route::get('/rules', \App\Http\Controllers\Site\Settings\RuleComponent::class)->name('rules');
Route::get('/contact-us', \App\Http\Controllers\Site\Settings\ContactUsComponent::class)->name('contact-us');
Route::get('/cooperation-request', \App\Http\Controllers\Site\Settings\CooperationRequestComponent::class)->name('cooperation-request');
Route::get('/why-farsgamer', \App\Http\Controllers\Site\Settings\WhyUsComponent::class)->name('why-us');

Route::get('/order-detail', \App\Http\Controllers\Site\Settings\OrdersDetailComponent::class)->name('order-detail');

Route::get('/articles', \App\Http\Controllers\Site\Articles\ArticlesComponent::class)->name('articles');
Route::get('/articles/{slug}', \App\Http\Controllers\Site\Articles\ArticleComponent::class)->name('articles.show');

Route::get('/categories/{slug}', App\Http\Controllers\Site\Categories\CategoryComponent::class)->name('index.categories');


Route::get('/cart', \App\Http\Controllers\Site\Carts\CartComponent::class)->name('cart');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [\App\Http\Controllers\Site\Auth\AuthComponent::class, 'logout'])->name('logout');

    Route::get('/cart/payment', \App\Http\Controllers\Site\Carts\CartPaymentComponent::class)->name('cart.payment');
    Route::get('/cart/checkout/{gateway?}', \App\Http\Controllers\Site\Carts\CartCheckoutComponent::class)->name('cart.checkout');

    Route::get('/dashboard', \App\Http\Controllers\Site\Dashboard\DashboardComponent::class)->name('dashboard');

    Route::get('/dashboard/orders', \App\Http\Controllers\Site\Dashboard\MyOrdersComponent::class)->name('dashboard.orders');
    Route::get('/dashboard/orders/{id}', \App\Http\Controllers\Site\Dashboard\ShowOrderComponent::class)->name('dashboard.orders.show');

    Route::get('/dashboard/profile', \App\Http\Controllers\Site\Dashboard\ProfileComponent::class)->name('dashboard.profile');
    Route::get('/dashboard/comments', \App\Http\Controllers\Site\Dashboard\MyCommentsComponent::class)->name('dashboard.comments');
    Route::get('/dashboard/notifications', \App\Http\Controllers\Site\Dashboard\MyNotificationsComponent::class)->name('dashboard.notifications');
});

Route::prefix('partner')->middleware(['auth','role:همکار'])->group(function () {
	Route::get('/dashboard', \App\Http\Controllers\Partner\Dashboards\IndexDashboard::class)->name('partner.dashboard');
    Route::get('/orders', \App\Http\Controllers\Partner\Orders\IndexOrder::class)->name('partner.orders');
	Route::get('/profile', \App\Http\Controllers\Partner\Settings\Profile::class)->name('partner.profile');
	Route::get('/wallet', \App\Http\Controllers\Partner\Wallets\IndexWallet::class)->name('partner.wallet');
	Route::get('/setting', \App\Http\Controllers\Partner\Settings\Setting::class)->name('partner.setting');
	Route::get('/new-order', \App\Http\Controllers\Partner\Orders\NewOrder::class)->name('partner.new.orders');
	Route::get('/new-order/{id}', \App\Http\Controllers\Partner\Orders\StoreNewOrder::class)->name('partner.store.new.orders');
	Route::get('/orders/{action}/{id}', \App\Http\Controllers\Partner\Orders\StoreOrder::class)->name('partner.order');
});

Route::get('/ApiCheckout/{gateway?}',[App\Http\Controllers\Api\BotApi::class,'startVerify']);
