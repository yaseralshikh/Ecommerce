<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\FrontendController;

Route::get('/', [FrontendController::class , 'index'])->name('frontend.index');
Route::get('/cart', [FrontendController::class , 'cart'])->name('frontend.cart');
Route::get('/checkout', [FrontendController::class , 'checkout'])->name('frontend.checkout');
Route::get('/detail', [FrontendController::class , 'detail'])->name('frontend.detail');
Route::get('/shop', [FrontendController::class , 'shop'])->name('frontend.shop');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [BackendController::class, 'login'])->name('login');
        Route::get('/forgot-password', [BackendController::class, 'forgot_password'])->name('forgot_password');
    });

    Route::group(['middleware' => ['roles', 'role:admin|supervisor']], function (){
        Route::get('/', [BackendController::class, 'index'])->name('index_route');
        Route::get('/index', [BackendController::class, 'index'])->name('index');
    });
});
