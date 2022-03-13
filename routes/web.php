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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\AuthenticateController@login')->name('admin.login');
    Route::post('/login', 'Admin\AuthenticateController@checkLogin')->name('admin.login');

//    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', 'Admin\IndexController@index')->name('admin.index');
        Route::resource('category', 'Admin\CategoryController');
        Route::resource('type_product', 'Admin\TypeProductController');
        Route::resource('supplier', 'Admin\SupplierController');
        Route::resource('product', 'Admin\ProductController');
        Route::resource('slide', 'Admin\SlideController');
        Route::get('order', 'Admin\OrderController@index')->name('admin.order');
        Route::post('order/update/{id}', 'Admin\OrderController@update')->name('admin.order.update');
        Route::get('order/{id}', 'Admin\OrderController@detail')->name('admin.order.detail');

        Route::post('ckeditor/image_upload', 'Admin\CKEditorController@upload')->name('upload');
//    });
});

Route::group(['prefix' => '/'], function () {
    Route::Post('/login', 'Page\AuthenticateController@login')->name('page.login');
    Route::post('/register', 'Page\AuthenticateController@register')->name('page.register');

    Route::get('/', 'Page\HomeController@index')->name('page.index');
    Route::get('/san-pham/{slug}', 'Page\ProductController@GetDetailProduct')->name('page.product.detail');
    Route::get('/san-pham', 'Page\ProductController@GetProducts')->name('page.product.list');

    Route::post('/add_to_cart', 'Page\CartController@add');
    Route::get('/remove/{id}', 'Page\CartController@remove');
    Route::get('/get_cart_content', 'Page\CartController@get');
    Route::get('/checkout', 'Page\CartController@checkout')->name('page.checkout');
    Route::get('/delivery', 'Page\CartController@delivery')->name('page.delivery');
    Route::post('/payment', 'Page\CartController@payment')->name('page.payment');
    Route::get('/receipt/{id}', 'Page\CartController@receipt')->name('page.receipt');
});
