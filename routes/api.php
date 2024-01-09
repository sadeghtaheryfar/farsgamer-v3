<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\ProductResourceCollection;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/products', function () {
	$products = Product::where('type',Product::TYPE_INSTANT_DELIVERY)->select('id','title')->get();
    return response([
        'data' => [
            'products' => [
                'records' => new ProductResourceCollection($products),
            ],
        ],
        'status' => 'success'
    ],Response::HTTP_OK);
});

Route::post('/validateNumber',[App\Http\Controllers\Api\BotApi::class,'otp']);

Route::post('/validateOtp',[App\Http\Controllers\Api\BotApi::class,'validateOtp']);

Route::post('/validateReduction',[App\Http\Controllers\Api\BotApi::class,'validateReduction']);

Route::post('/startPayment',[App\Http\Controllers\Api\BotApi::class,'startPayment']);

Route::get('/wallet',function(Request $req) {
	return response()->json([
		'data' => [
			'wallet' => User::findOrFail($req->get('id'))->balance
		]
	]);
});

// Route::get('/ApiCheckout/{gateway?}',[App\Http\Controllers\Api\BotApi::class,'startVerify']);


// Route::get('/users', function () {
// 	$users = collect(User::withCount('orders')->whereHas('orders')->cursor())->where('orders_count','>',3);
//     return response()->json($users->map(function($item,$key){
// 			return [ 'name' => $item->name,'family' => $item->family, 'phone' => $item->mobile];
// 		}));
// });
