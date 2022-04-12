<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;

Route::group(['prefix' => ''], function() {
    Route::get('','HomeController@home')->name('client.home');
    Route::get('contact','HomeController@contact')->name('client.contact');
    Route::get('about','HomeController@about')->name('client.about');
    Route::get('shop','HomeController@shop')->name('client.shop');
    Route::get('gallery','HomeController@gallery')->name('client.gallery');
    Route::get('cart','HomeController@cart')->name('client.cart');
    Route::get('check_out','HomeController@check_out')->name('client.check_out');
    Route::get('/{id}-{slug}','HomeController@shop_detail')->name('client.shop_detail');
    Route::get('category/{id}-{slug}','HomeController@category')->name('client.category');
    Route::get('search/{id}-{slug}','HomeController@search')->name('client.search');

});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('','AdminController@index')->name('admin.index');
    Route::get('logout','AdminController@logout')->name('admin.logout');
    Route::get('category','CategoryController@index')->name('category.index');
    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::post('category','CategoryController@store')->name('category.store');
    Route::get('category/{id}/edit','CategoryController@edit')->name('category.edit');
    Route::put('category/{id}','CategoryController@update')->name('category.update');
    Route::delete('category/{id}','CategoryController@delete')->name('category.delete');
    Route::get('category/trashed','CategoryController@trashed')->name('category.trashed');
    Route::get('category/restore/{id}','CategoryController@restore')->name('category.restore');
    Route::get('category/forcedelete/{id}','CategoryController@forcedelete')->name('category.forcedelete');

    /** Product Table **/

    Route::get('product','ProductController@index')->name('product.index');
    Route::get('product/create','ProductController@create')->name('product.create');
    Route::post('product','ProductController@store')->name('product.store');
    Route::get('product/{id}/edit','ProductController@edit')->name('product.edit');
    Route::put('product/{id}','ProductController@update')->name('product.update');
    Route::delete('product/{id}','ProductController@delete')->name('product.delete');
    Route::get('product/trashed','ProductController@trashed')->name('product.trashed');
    Route::get('product/restore/{id}','ProductController@restore')->name('product.restore');
    Route::get('product/forcedelete/{id}','ProductController@forcedelete')->name('product.forcedelete');
    Route::get('product/delete-image/{id}','ProductController@deleteImage')->name('delete.deleteImage');

    /** Quản lí đơn hàng */
    Route::get('order','AdminOrderController@index')->name('order.index');
    Route::get('order/detail/{id}','AdminOrderController@detail')->name('admin.order.detail');
    Route::post('order/status/{id}','AdminOrderController@status')->name('admin.order.status');

});


Route::group(['prefix' => 'customer'], function() {
    Route::get('login','CustomerController@login')->name('customer.login');
    Route::post('login','CustomerController@check_login');

    Route::get('register','CustomerController@register')->name('customer.register');
    Route::post('register','CustomerController@add_customer');

    Route::get('logout','CustomerController@logout')->name('customer.logout');

    Route::get('forgot_password','CustomerController@forgot_password')->name('customer.forgot_password');
    Route::post('forgot_password','CustomerController@forgot_password_reset');

    Route::get('profile','CustomerController@profile')->name('customer.profile')->middleware('cus_auth');
    Route::post('profile','CustomerController@update_profile')->middleware('cus_auth');

});

Route::group(['prefix' => 'cart'], function() {
    Route::get('add/{id}','CartController@add')->name('cart.add');
    Route::get('remove/{id}','CartController@remove')->name('cart.remove');
    Route::get('update/{id}','CartController@update')->name('cart.update');
    Route::get('clear','CartController@clear')->name('cart.clear');
    Route::get('view','CartController@view')->name('cart.view');
   
});

Route::group(['prefix' => 'order', 'middleware' => 'cus_auth'], function() {
    Route::get('checkout','OrderController@checkout')->name('order.checkout');
    Route::post('checkout','OrderController@post_checkout');
    Route::get('history','OrderController@history')->name('order.history');
    Route::get('detail/{id}','OrderController@detail')->name('order.detail');
    Route::get('pdf/{id}','OrderController@pdf')->name('order.pdf');
    Route::get('success','OrderController@success')->name('order.success');
    Route::get('error','OrderController@error')->name('order.error');
    Route::get('confirm/{token}','OrderController@confirm')->name('order.confirm');

});

Route::get('admin/login','AdminController@login')->name('admin.login');
Route::post('admin/login','AdminController@check_login');



