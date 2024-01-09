<?php
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

//Artisan::call('up');
//Artisan::call('down --render=503 --secret=qweasdzxcrtyfghvbn');

//Route::get('storageLink', [\App\Http\Controllers\Admin\ArtisanCommand::class, 'storageLink']);

Route::prefix('lfm')->middleware(['web', 'auth', 'role:admin'])->group(function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware(['auth', 'role:admin','schedule'])->group(function () {
    Route::get('dashboard', \App\Http\Controllers\Admin\Dashboards\IndexDashboard::class)
        ->name('dashboard');

    Route::get('categories', \App\Http\Controllers\Admin\Categories\IndexCategory::class)
        ->name('categories');
    Route::get('categories/{action}/{id?}', \App\Http\Controllers\Admin\Categories\StoreCategory::class)
        ->name('categories.store');

    Route::get('currencies', \App\Http\Controllers\Admin\Currencies\IndexCurrency::class)
        ->name('currencies');
    Route::get('currencies/{action}/{id?}', \App\Http\Controllers\Admin\Currencies\StoreCurrency::class)
        ->name('currencies.store');

    Route::get('products/orders', \App\Http\Controllers\Admin\Products\IndexProductOrder::class)
        ->name('products.order');
    Route::get('products/orders/{action}/{id?}', \App\Http\Controllers\Admin\Products\StoreProductOrder::class)
        ->name('products.order.store');
    Route::get('products', \App\Http\Controllers\Admin\Products\IndexProduct::class)
        ->name('products');
    Route::get('products/{action}/{id?}', \App\Http\Controllers\Admin\Products\StoreProduct::class)
        ->name('products.store');

	Route::get('/tickets', \App\Http\Controllers\Admin\Tickets\IndexTicket::class)->name('ticket');
    Route::get('/tickets/{action}/{id?}', \App\Http\Controllers\Admin\Tickets\StoreTicket::class)->name('store.ticket');	

    Route::get('orders', \App\Http\Controllers\Admin\Orders\IndexOrder::class)
        ->name('orders');
    Route::get('orders/{action}/{id?}', \App\Http\Controllers\Admin\Orders\StoreOrder::class)
        ->name('orders.store');

		Route::get('order/new', \App\Http\Controllers\Admin\Orders\CreateOrder::class)
        ->name('orders.new');


	Route::get('license', \App\Http\Controllers\Admin\Products\IndexLicense::class)
        ->name('license');

		Route::get('depot', \App\Http\Controllers\Admin\Depot\IndexDepot::class)
        ->name('depot');

	Route::get('wallet', \App\Http\Controllers\Admin\Wallets\IndexWallet::class)
        ->name('wallet');	

	Route::get('factor/{id}', \App\Http\Controllers\Admin\Factor\IndexFactor::class)
        ->name('factor');	

	Route::get('digital-depot-test-test', \App\Http\Controllers\Admin\Depot\IndexDigitalDepot::class)
        ->name('digital_depot');	

    Route::get('vouchers', \App\Http\Controllers\Admin\Vouchers\IndexVoucher::class)
        ->name('vouchers');
    Route::get('vouchers/{action}/{id?}', \App\Http\Controllers\Admin\Vouchers\StoreVoucher::class)
        ->name('vouchers.store');

	Route::get('teams', \App\Http\Controllers\Admin\Teams\IndexTeam::class)
        ->name('teams');

	Route::get('lottery', \App\Http\Controllers\Admin\Lotteries\IndexLottery::class)
        ->name('lottery');
		
    Route::get('teams/{action}/{id?}', \App\Http\Controllers\Admin\Teams\StoreTeam::class)
        ->name('teams.store');

    Route::get('comments', \App\Http\Controllers\Admin\Comments\IndexComment::class)
        ->name('comments');
    Route::get('comments/{action}/{id?}', \App\Http\Controllers\Admin\Comments\StoreComment::class)
        ->name('comments.store');

    Route::get('questions', \App\Http\Controllers\Admin\Questions\IndexQuestion::class)
        ->name('questions');


	Route::get('myLanguage', \App\Http\Controllers\Admin\Settings\MyLanguage::class)
        ->name('myLanguage');

    Route::get('questions/{action}/{id?}', \App\Http\Controllers\Admin\Questions\StoreQuestion::class)
        ->name('questions.store');

    Route::get('articles', \App\Http\Controllers\Admin\Articles\IndexArticle::class)
        ->name('articles');
		Route::get('articles/categories', \App\Http\Controllers\Admin\Articles\CategoryArticles::class)
        ->name('articlesCat');
	Route::get('articles/categories/{action}/{id?}', \App\Http\Controllers\Admin\Articles\StoreArticleCategory::class)
        ->name('articlesCat.manage');
    Route::get('articles/{action}/{id?}', \App\Http\Controllers\Admin\Articles\StoreArticle::class)
        ->name('articles.store');


	Route::get('guaranteed', \App\Http\Controllers\Admin\Articles\IndexGuaranteed::class)
        ->name('guaranteed');
    Route::get('guaranteed/{action}/{id?}', \App\Http\Controllers\Admin\Articles\StoreGuaranteed::class)
        ->name('guaranteed.store');


    Route::get('logs', \App\Http\Controllers\Admin\Logs\IndexLog::class)
        ->name('logs');
    Route::get('logs/show/{id}', \App\Http\Controllers\Admin\Logs\ShowLog::class)
        ->name('logs.show');

    Route::get('users/roles', \App\Http\Controllers\Admin\Users\IndexRole::class)
        ->name('roles');
	Route::get('users/partners', \App\Http\Controllers\Admin\Users\IndexPartner::class)
        ->name('partners');
    Route::get('users/roles/{action}/{id?}', \App\Http\Controllers\Admin\Users\StoreRole::class)
        ->name('roles.store');

    Route::get('users/transaction', \App\Http\Controllers\Admin\Users\IndexTransaction::class)
        ->name('transaction');

    Route::get('users', \App\Http\Controllers\Admin\Users\IndexUser::class)
        ->name('users');
    Route::get('users/{action}/{id?}', \App\Http\Controllers\Admin\Users\StoreUser::class)
        ->name('users.store');

	Route::get('forms', \App\Http\Controllers\Admin\Reports\IndexForms::class)
        ->name('forms');
    Route::get('forms/{action}/{id?}', \App\Http\Controllers\Admin\Reports\StoreForms::class)
        ->name('forms.store');

	Route::get('admin-forms', \App\Http\Controllers\Admin\Reports\IndexAdminForms::class)
        ->name('admin.forms');
    Route::get('admin-forms/{action}/{id?}', \App\Http\Controllers\Admin\Reports\StoreAdminForms::class)
        ->name('admin.forms.store');

	Route::get('my-forms', \App\Http\Controllers\Admin\Reports\IndexMyForms::class)
        ->name('my.forms');
    Route::get('my-forms/{action}/{id?}', \App\Http\Controllers\Admin\Reports\StoreMyForms::class)
        ->name('my.forms.store');	

    Route::get('analytics/vouchers', \App\Http\Controllers\Admin\Analytics\IndexVoucher::class)
        ->name('analytics.vouchers');

    Route::get('settings/homes', \App\Http\Controllers\Admin\Settings\HomeComponent::class)
        ->name('homes');

    Route::get('settings/streams', \App\Http\Controllers\Admin\Settings\StreamsComponent::class)
        ->name('streams');

	Route::get('settings/windows', \App\Http\Controllers\Admin\Settings\WindowComponent::class)
    ->name('windows');


	Route::get('settings/windows/{action}', \App\Http\Controllers\Admin\Settings\StoreWindow::class)
    ->name('windows.create');

	Route::get('settings/windows/{action}/{window}', \App\Http\Controllers\Admin\Settings\StoreWindow::class)
    ->name('windows.window');



    Route::get('settings/faqs', \App\Http\Controllers\Admin\Settings\IndexFaq::class)
        ->name('faqs');
    Route::get('settings/faqs/{action}/{id?}', \App\Http\Controllers\Admin\Settings\StoreFaq::class)
        ->name('faqs.store');

    Route::get('settings/rules', \App\Http\Controllers\Admin\Settings\IndexRule::class)
        ->name('rules');
    Route::get('settings/rules/{action}/{id?}', \App\Http\Controllers\Admin\Settings\StoreRule::class)
        ->name('rules.store');

    Route::get('settings/physical-rules', \App\Http\Controllers\Admin\Settings\IndexPhysicalRule::class)
        ->name('physical');
    Route::get('settings/physical-rules/{action}/{id?}', \App\Http\Controllers\Admin\Settings\StorePhysicalRule::class)
        ->name('physical.store');

	Route::get('settings/card-rules', \App\Http\Controllers\Admin\Settings\IndexCartsRule::class)
        ->name('card');
    Route::get('settings/card-rules/{action}/{id?}', \App\Http\Controllers\Admin\Settings\StoreCartRule::class)
        ->name('card.store');

    Route::get('settings/notifications', \App\Http\Controllers\Admin\Settings\IndexNotification::class)
        ->name('notifications');
    Route::get('settings/notifications/{action}/{id?}', \App\Http\Controllers\Admin\Settings\StoreNotification::class)
        ->name('notifications.store');

    Route::get('settings/banner', \App\Http\Controllers\Admin\Settings\BannerComponent::class)
        ->name('banner');

    Route::get('settings/sms', \App\Http\Controllers\Admin\Settings\SmsComponent::class)
        ->name('sms');

    Route::get('settings', \App\Http\Controllers\Admin\Settings\SettingComponent::class)
        ->name('settings');
		Route::get('settings/languages', \App\Http\Controllers\Admin\Settings\IndexLanguage::class)
        ->name('languages');
});
