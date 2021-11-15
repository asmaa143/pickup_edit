<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\storedashboard\LoginController;
use App\Http\Controllers\storedashboard\CategoryController;
use App\Http\Controllers\storedashboard\TagController;
use App\Http\Controllers\storedashboard\ProductController;
use App\Http\Controllers\storedashboard\BranchController;
use App\Http\Controllers\storedashboard\ZonePriceController;
use App\Http\Controllers\storedashboard\AjaxController;
use App\Http\Controllers\storedashboard\DriverController;
use App\Http\Controllers\storedashboard\StoreSettingController;
use App\Http\Controllers\storedashboard\StoreEmployeeController;
use App\Http\Controllers\storedashboard\OrderController;
use App\Http\Controllers\storedashboard\CustomerController;
use App\Http\Controllers\storedashboard\NotificationController;
use App\Http\Controllers\storedashboard\AddsController;
use App\Http\Controllers\storedashboard\ZoneController;
use App\Http\Controllers\storedashboard\WorkShiftController;
use App\Http\Controllers\storedashboard\CouponController;
use App\Http\Controllers\storedashboard\AboutController;
use App\Http\Controllers\storedashboard\PrivacyController;
use App\Http\Controllers\storedashboard\TermController;
use App\Http\Controllers\storedashboard\HomeController;
use App\Http\Controllers\storedashboard\ProductRateController;
use App\Http\Controllers\storedashboard\QuestionController;
use App\Http\Controllers\storedashboard\StoreTableController;


Route::group(
    [
   
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
        'prefix' => LaravelLocalization::setLocale(),
    ], function(){ 
Route::group(['prefix' => 'storedashboard'],function(){
    Route::group(['middleware' => 'guest:storeemployee'],function(){
    Route::get("storelogin",[LoginController::class,"storelogin"])->name("storelogin");
    Route::post("storesignin",[LoginController::class,"storesignin"])->name("storesignin");
    });
    Route::group(['middleware' => 'auth:storeemployee'],function(){
        Route::get("storelogout",[LoginController::class,"storelogout"])->name("storelogout");
        Route::resource("categories",CategoryController::class);
        Route::resource("tags",TagController::class);
        Route::resource("products",ProductController::class);
        Route::resource("branches",BranchController::class);
        Route::resource("zonesprices",ZonePriceController::class);
        Route::get("getstorecities/{id}",[AjaxController::class,"getstorecities"]);
        Route::get("getstorezones/{id}",[AjaxController::class,"getstorezones"]);
        Route::post("zonesprices/storezone",[ZonePriceController::class,"storezone"])->name("zonesprices.storezone");
        Route::resource("drivers",DriverController::class);
        Route::get("addminimum",[StoreSettingController::class,"addminimum"])->name("addminimum");
        Route::post("storeminimum",[StoreSettingController::class,"storeminimum"])->name("storeminimum");
        Route::resource("storeemployees",StoreEmployeeController::class);
        Route::get("addorder",[OrderController::class,"addorder"])->name("addorder");
        Route::post("storeorder",[OrderController::class,"storeorder"])->name("storeorder");
        Route::post("storeorder2",[OrderController::class,"storeorder2"])->name("storeorder2");
        Route::post("storeorder3",[OrderController::class,"storeorder3"])->name("storeorder3");
        Route::get("invoice",[OrderController::class,"invoice"])->name("invoice");
        Route::get("orders",[OrderController::class,"orders"])->name("orders");
        Route::get("ordertable",[OrderController::class,"ordertable"])->name("ordertable");
        Route::get("showorder/{id}",[OrderController::class,"showorder"])->name("showorder");
        Route::get("customers",[CustomerController::class,"index"])->name("customers");
        Route::get("customersorders/{id}",[CustomerController::class,"orders"])->name("customersorders");
        Route::resource("notifications",NotificationController::class);
        Route::resource("adds",AddsController::class);
        Route::resource("zonesstore",ZoneController::class);
        Route::resource("workshifts",WorkShiftController::class);
        Route::resource("coupons",CouponController::class);
        Route::get("about",[AboutController::class,"about"])->name("about");
        Route::put("editabout",[AboutController::class,"editabout"])->name("editabout");
        Route::get("terms",[TermController::class,"terms"])->name("terms");
        Route::put("editterm",[TermController::class,"editterm"])->name("editterms");
        Route::get("privacy",[PrivacyController::class,"privacy"])->name("privacy");
        Route::put("editprivacy",[PrivacyController::class,"editprivacy"])->name("editprivacy");
        Route::get("mainpage",[HomeController::class,"index"])->name("mainpage");
        Route::get("productrates",[ProductRateController::class,"index"])->name("productrates");
        Route::get("showrproductrate/{id}",[ProductRateController::class,"show"])->name("showrproductrate");
        Route::resource("questions",QuestionController::class);
        Route::resource("storetables",StoreTableController::class);
        Route::get("activecoupon/{id}",[CouponController::class,"activecoupon"])->name("activecoupon");
});
    });
});