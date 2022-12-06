<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::group(['namespace' => 'Dashboard','middleware' => 'auth'],function(){
//     Route::get('user','UserController','index');
// });





// Route::middleware(['auth','admin'])->group(function () {

//     });







// Route::controller(App\Http\Controllers\Dashboard\LoginController::class)->group(function () {

//     // Route::get('login', function () {
//     //     return "Welcome to login";
//     // })->name('admin.login');

//     //Route::get('/dash', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name("admin.dash");

//     Route::get('login','login')->name('admin.login');
//     Route::post('login','postLogin')->name('admin.login.post');
//     });



Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function(){


/// Note : there is prefix in (Authenticate) file for all file route
    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admin','prefix'=>'admin'], function () {
        //The First Page admin will visit after logining
        Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name("admin.dashboard");

        Route::prefix('settings')->group(function () {
            Route::get('shipping-methods/{type}',[App\Http\Controllers\Dashboard\SettingsController::class,'editShippingMethods'])->name("edit.shipping.methods");
            Route::put('shipping-methods/{id}',[App\Http\Controllers\Dashboard\SettingsController::class,'updateShippingMethods'])->name("update.shipping.methods");

            });

    });

    Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin','prefix'=>'admin'], function () {
        Route::get('login', [App\Http\Controllers\Dashboard\LoginController::class, 'login'])->name('admin.login');
        Route::post('login', [App\Http\Controllers\Dashboard\LoginController::class, 'postLogin'])->name('admin.login.post');
    });



});
