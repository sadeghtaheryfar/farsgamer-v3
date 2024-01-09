<?php

namespace App\Providers;

use App\Http\Controllers\Cart\Cart;
use App\Http\Controllers\FormBuilder\FormBuilder;
use App\Http\Controllers\Smsir\Smsir;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Currency;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderNote;
use App\Models\PaymentTransaction;
use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductLicense;
use App\Models\Question;
use App\Models\Role;
use App\Models\Score;
use App\Models\Setting;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherMeta;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		
        $this->app->bind('FormBuilder', function () {
            return new FormBuilder();
        });

        $this->app->bind('cart', function () {
            return new Cart();
        });

        $this->app->bind('smsir', function () {
            return new Smsir();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		
        $settings = Setting::whereIn('name', [
            'top_alert', 'footer_description', 'address', 'email', 'phone', 'facebook', 'telegram', 'instagram', 'twitter',
        ])->get();

        \View::share('top_alert', $settings->where('name', 'top_alert')->first()->value ?? '');
        \View::share('footerDescription', $settings->where('name', 'footer_description')->first()->value ?? '');
        \View::share('address', $settings->where('name', 'address')->first()->value ?? '');
        \View::share('email', $settings->where('name', 'email')->first()->value ?? '');
        \View::share('phone', $settings->where('name', 'phone')->first()->value ?? '');
        \View::share('facebook', $settings->where('name', 'facebook')->first()->value ?? '');
        \View::share('telegram', $settings->where('name', 'telegram')->first()->value ?? '');
        \View::share('instagram', $settings->where('name', 'instagram')->first()->value ?? '');
        \View::share('twitter', $settings->where('name', 'twitter')->first()->value ?? '');

        Relation::morphMap([
            'article' => Article::class,
            'category' => Category::class,
            'comment' => Comment::class,
            'currency' => Currency::class,
//            'notification' => Notification::class,
            'order' => Order::class,
//            'orderDetail' => OrderDetail::class,
//            'orderNote' => OrderNote::class,
//            'paymentTransaction' => PaymentTransaction::class,
//            'permission' => Permission::class,
            'product' => Product::class,
            'product_license' => ProductLicense::class,
            'question' => Question::class,
//            'role' => Role::class,
//            'score' => Score::class,
            'setting' => Setting::class,
//            'smsir' => \App\Models\Smsir::class,
//            'transaction' => \App\Models\Transaction::class,
//            'transfer' => \App\Models\Transfer::class,
            'user' => User::class,
//            'voucher' => Voucher::class,
//            'voucherMeta' => VoucherMeta::class,
//            'wallet' => Wallet::class,
        ]);
    }
}
