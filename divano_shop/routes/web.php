<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'FrontEnd'],function(){
    Route::get('/','HomeController@index')->name('home.index');
    Route::get('cart-wrapper','HomeController@create')->name('home.create');
    Route::post('pro-show','HomeController@store')->name('home.store');
    Route::resources([
        'about' => 'AboutController',
        'contact' => 'ContactController',
        'login' => 'LoginController',
        'product' => 'ProductController',
        'cart' => 'CartController',
        'pay-cart' => 'PayCartController',
        'categories'  => 'CateProController',
        'blog'  => 'BlogController',
        'wishlist'  => 'WishController',
    ]);
    Route::resource('login','LoginController')->middleware('CheckLogin');
});

Route::group(['prefix' => 'admin','namespace'=>'BackEnd'],function(){
    Route::middleware('CheckUser')->group(function(){
        Route::resources([
            '/' => 'DashboardController',
            'dashboard' => 'DashboardController',
            'account'   => 'M_AccountController',
            'products'  => 'M_ProductController',
            'gallery'   => 'GalleryController',
            'category'  => 'M_CategoryController',
            'order'     => 'M_OrderController',
            'slider'    => 'M_SliderController',
            'coupon'    => 'M_CouponController',
            'blogs'    => 'M_BlogController',
        ]);

    });
});

