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


/// Note : there is prefix in (Authenticate) file for all file route
Route::middleware(['auth','admin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Dashboard\UserController::class, 'index'])->name("admin.dashboard");
    Route::get('home', [App\Http\Controllers\Dashboard\UserController::class, 'home']);
    });

Route::controller(App\Http\Controllers\Dashboard\LoginController::class)->group(function () {

    // Route::get('login', function () {
    //     return "Welcome to login";
    // })->name('admin.login');


    Route::get('login','login')->name('admin.login');
    Route::post('login','postLogin')->name('admin.login.post');
    });

