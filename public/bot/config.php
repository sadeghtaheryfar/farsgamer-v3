<?php

// bot

define('BOT_TOKEN','5659292748:AAGV_Q1feejvd6YB7NZD_mdstP4jppT91HM');

define('API_URL','https://api.telegram.org/bot');

define('BOT_ADDRESS',API_URL.BOT_TOKEN);

define('STARTER','/start');

define('CART','/cart');

define('RESET','/reset');

define('SKIP','/skip');

define('ORDER','/order');

define('SUPPORT', '/support');

define('ERROR_FILE','error.txt');

define('BACK_PREFIX','back');

define('EXPLODE_SIGN','_');

// channels

define('CHANNEL_LINKS',[
	['link'=> 'https://t.me/FarsGamer' , 'id' => '@FarsGamer', 'name' => 'کانال فارس گیمر '],
]);

define('CHANNEL_LEFT_MESSAGE','کاربر گرامی برای استفاده از ربات باید در کانال زیر عضو شوید');

define('CHANNEL_ADDED' ,'عضو شدم✔️');

// cart

define('CART_PREFIX_DELETE_SINGLE', 'deleteCartSingle');

define('CART_PREFIX_DELETE', 'deleteCart');

define('CART_PREFIX_PAY', 'payCart');

define('MAX_CART_ITEMS', 12);

define('CART_SKIP_STEP', 'skipStep');

define('MAX_CART_MESSAGE', ' کاربر گرامی در حال حاضر ظرفیت سبد خرید ما تکمیل می باشد');

define('ADDED_MESSAGE', 'محصول با موفقیت به سبد خرید شما اضافه شد');

define('CART_STATUS', [
	'pending' => ['key' => 'pending','value' => 'تکمیل نشده'],
	'completed' => ['key' => 'pending' ,'value' => 'تککیل شده']
]);

// products

define('PRODUCT_SELECTION','
🔷| کاربر گرامی فارس گیمر لطفا محصول مورد نظر خود را انتخاب نمایید:

👨🏻‍💻| درصورت وجود هرگونه مسئله یا مشکل میتوانید با تیم پشتیبانی ما در ارتباط باشید:

💠 @FarsGamerSupport
📞| 02191300908
');

define('PRODUCTS_PER_PAGE', 5);

define('PHYSICAL_PRODUCTS', 'physical');

define('PRODUCTS_FILL_DATA', 'fillProductForms');

define('PRODUCTS_FILL_DATA_QUANTITY', 'quantity');

define('PRODUCTS_FILL_DATA_FORM', 'forms');

define('PRODUCTS_TITLE_MAX_LENGTH', 70);

define('PRODUCTS_DISCOUNT_TYPE_FIXED','fixed');

define('PRODUCTS_DISCOUNT_TYPE_PERCENTAGE','percentage');

define('PRODUCT_PREFIX','product');

// category

define('CATEGORY_SELECTION','
🔷| کاربر گرامی فارس گیمر لطفا دسته بندی مورد نظر خود را انتخاب نمایید:

👨🏻‍💻| درصورت وجود هرگونه مسئله یا مشکل میتوانید با تیم پشتیبانی ما در ارتباط باشید:

💠 @FarsGamerSupport
📞| 02191300908
');

define('CATEGORY_PREFIX','category');

// payment

define('PAYMENT_STEPS' , [
	'number' => ['label' => '✍🏻 شماره خود را وارد نمایید','key' => 'number'],
	'otp' => ['label' => '🔐 کد امنیتی ارسال شده را وارد نمایید','key' => 'otp'],
	'email' => ['label' => '📧 ادرس ایمیل خود را وارد نمایید','key'=> 'email'],
	'province' => ['label' => '🏠 استان خود را وارد نمایید' , 'key' => 'province'],
	'city' => ['label' => '🏠 شهر خود را وارد نمایید' , 'key' => 'city'],
	'postalCode' => ['label' => '🏠 کد پستی خود را وارد نمایید' , 'key' => 'postalCode'],
	'address' => ['label' => '🏠 ادرس  خود را وارد نمایید' , 'key' => 'address'],
	'reduction_code' => ['label' => "
	در صورتی که کد تخفیف دارد وارد نمایید 💯
	\n\n\n
	در غیر این صورت روی ".SKIP." کلیک نمایید
	",'key'=> 'reduction_code'],
	'completed' => ['label' => '⏳ در حال اماده سازی درگاه پرداخت...' , 'key' => 'completed']
]);

define('PAYMENT_STEP', 'paymentStep');

// support

define('SUPPORT_MESSAGE', '
🔷| جهت دریافت پشتیبانی از طریق راه های زیر با ما در ارتباط باشید 👇🏻:
1- پشتیبانی تلگرام:
@FarsGamerSupport

2-پشتیبانی چت آنلاین وب سایت:

https://tawk.to/chat/5f2946912da87279037e4523/default

3- تماس با پشتیبانی:
02191300908
');