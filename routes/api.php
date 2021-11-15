<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\CallCenterController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'customer'], function () {
//unauthenticated routes for customer here


    Route::post('sign-up', [CustomerController::class, 'signup']);
    Route::post('login', [CustomerController::class, 'login']);
    Route::post('check_phone', [CustomerController::class, 'check_phone']);
    Route::post('reset_password', [CustomerController::class, 'reset_password']);
    Route::get('fetch_languages', [CustomerController::class, 'fetch_languages']);
    Route::get('fetch_settings', [CustomerController::class, 'fetch_settings']);

    Route::post('categories', [CustomerController::class, 'categories']);
    Route::get('adds', [CustomerController::class, 'adds']);
    Route::get('pickup_adds', [CustomerController::class, 'pickup_adds']);
    Route::get('index', [CustomerController::class, 'index']);
    Route::post('indexAll', [CustomerController::class, 'indexAll']);
    Route::post('fetch_seller_menu', [CustomerController::class, 'fetch_seller_menu']);
    Route::post('product', [CustomerController::class, 'get_product']);
    Route::get('fetch_expect_search_words', [CustomerController::class, 'ExpectWord']);
    Route::post('search', [CustomerController::class, 'search']);


Route::group(['middleware' => ['auth:customer', 'scopes:customer']], function () {
// authenticated customer routes here

    Route::get('phone_verify', [CustomerController::class, 'phone_verify']);
    Route::get('fetch_my_locations', [CustomerController::class, 'fetch_my_locations']);
    Route::post('change_password', [CustomerController::class, 'change_password']);
    Route::post('postAddress', [CustomerController::class, 'postAddress']);
    Route::post('add_product_like', [CustomerController::class, 'customer_like_product']);
    Route::get('fetch_product_like', [CustomerController::class, 'likes']);
    Route::post('add_product_rate', [CustomerController::class, 'customer_rate_product']);
    Route::post('fetch_product_rates', [CustomerController::class, 'getRateproduct']);
###################################################################################################
    Route::post('add_to_cart', [CustomerController::class, 'postCart']);
    Route::get('get_cart', [CustomerController::class, 'getCart']);
    Route::post('increase_cart', [CustomerController::class, 'increaseCart']);
    Route::post('decrease_cart', [CustomerController::class, 'decreaseCart']);
    Route::post('delete_cart_item', [CustomerController::class, 'deleteCart']);
    Route::post('coupon', [CustomerController::class, 'coupon']);
####################################################################################################
    Route::post('send_order', [CustomerController::class, 'order']);
    Route::post('reorder', [CustomerController::class, 'reorder']);
    Route::post('rate_order', [CustomerController::class, 'rateOrder']);
    Route::post('cancel_order', [CustomerController::class, 'cancel_order']);
    Route::get('getOrders', [CustomerController::class, 'getOrders']);








    });
});

Route::group(['prefix' => 'callcenter'], function () {

    Route::post('login', [CallCenterController::class, 'login']);

Route::group(['middleware' => ['auth:callcenter', 'scopes:callcenter']], function () {
    
    Route::get('categories', [CallCenterController::class, 'categories']);
    Route::post('products', [CallCenterController::class, 'products']);
    Route::post('add_to_cart', [CallCenterController::class, 'postCart']);
    Route::get('get_cart', [CallCenterController::class, 'getCart']);
    Route::post('increase_cart', [CallCenterController::class, 'increaseCart']);
    Route::post('decrease_cart', [CallCenterController::class, 'decreaseCart']);
    Route::post('delete_cart_item', [CallCenterController::class, 'deleteCart']);
    Route::post('postAddress', [CallCenterController::class, 'postAddress']);
    Route::get('getClients', [CallCenterController::class, 'getClient']);
    Route::post('search_clients', [CallCenterController::class, 'search_clients']);















    });

});

