<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeedashboard\StateController;
use App\Http\Controllers\employeedashboard\CityController;
use App\Http\Controllers\employeedashboard\DashboardController;
use App\Http\Controllers\employeedashboard\ZoneController;
use App\Http\Controllers\employeedashboard\SettingController;
use App\Http\Controllers\employeedashboard\ExpenseTypeController;
use App\Http\Controllers\employeedashboard\PaymentWayController;
use App\Http\Controllers\employeedashboard\MajorController;
use App\Http\Controllers\employeedashboard\StoreController;
use App\Http\Controllers\employeedashboard\EmployeeController;
use App\Http\Controllers\employeedashboard\LoginController;
use App\Http\Controllers\employeedashboard\LanguageController;
Route::get("new",function(){
    return "ASas";
});
Route::group(
    [
   
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
        'prefix' => LaravelLocalization::setLocale(),
    ], function(){ 
Route::group(['prefix' => 'employeedashboard'],function(){
    Route::group(['middleware' => 'guest:employee'],function(){
    Route::get("employeelogin",[LoginController::class,"employeelogin"])->name("employeelogin");
    Route::post("employeesignin",[LoginController::class,"employeesignin"])->name("employeesignin");
    });
    Route::group(['middleware' => 'auth:employee'],function(){
    Route::get("employeelogout",[LoginController::class,"employeelogout"])->name("employeelogout");
  Route::resource("states",StateController::class);
  Route::resource("cities",CityController::class);
  Route::get("getcities/{id}",[CityController::class,'getcities']);
  Route::get("getzones/{id}",[ZoneController::class,'getzones']);
  Route::resource("zones",ZoneController::class);
  Route::get("/",[DashboardController::class,'index'])->name('mainpage');
  Route::get("setting",[SettingController::class,'setting'])->name('setting');
  Route::post("savesetting",[SettingController::class,'savesetting'])->name('savesetting');
  Route::resource("expensetypes",ExpenseTypeController::class);
  Route::resource("paymentways",PaymentWayController::class);
  Route::resource("majors",MajorController::class);
  Route::resource("stores",StoreController::class);
  Route::resource("employees",EmployeeController::class);
  Route::get("langauges",[LanguageController::class,'index'])->name('langauges');
  Route::get("editlanguage/{locale}",[LanguageController::class,'edit'])->name('editlanguage');
  Route::post("updatelanguage/{locale}",[LanguageController::class,'update'])->name('updatelanguage');
});
});
    });