<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;

Route::group(['prefix' => ''], function() {
    Route::get('',[HomeController::class,'home'])->name('client.home');
    Route::get('contact',[HomeController::class,'contact'])->name('client.contact');
    Route::get('about',[HomeController::class,'about'])->name('client.about');
    Route::get('shop',[HomeController::class,'shop'])->name('client.shop');
    Route::get('gallery',[HomeController::class,'gallery'])->name('client.gallery');
    Route::get('cart',[HomeController::class,'cart'])->name('client.cart');
    Route::get('check_out',[HomeController::class,'check_out'])->name('client.check_out');
    Route::get('/{id}-{slug}',[HomeController::class,'shop_detail'])->name('client.shop_detail');
    Route::get('category/{id}-{slug}',[HomeController::class,'category'])->name('client.category');
    Route::get('search/{id}-{slug}',[HomeController::class,'search'])->name('client.search');

});

Route::group(['prefix' => 'admin','middleware' => 'auth'], function (){
    Route::get('',[AdminController::class,'index'])->name('admin.index');
    Route::get('logout',[AdminController::class,'logout'])->name('admin.logout');

    
    Route::get('category',[CategoryController::class,'index'])->name('category.index');
    Route::get('category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('category',[CategoryController::class,'store'])->name('category.store');
    Route::get('category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('category/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::delete('category/{id}',[CategoryController::class,'delete'])->name('category.delete');
    Route::get('category/trashed',[CategoryController::class,'trashed'])->name('category.trashed');
    Route::get('category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::get('category/forcedelete/{id}',[CategoryController::class,'forcedelete'])->name('category.forcedelete');

    /** Product Table **/

    Route::get('product',[ProductController::class,'index'])->name('product.index');
    Route::get('product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('product',[ProductController::class,'store'])->name('product.store');
    Route::get('product/{id}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('product/{id}',[ProductController::class,'update'])->name('product.update');
    Route::delete('product/{id}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('product/trashed',[ProductController::class,'trashed'])->name('product.trashed');
    Route::get('product/restore/{id}',[ProductController::class,'restore'])->name('product.restore');
    Route::get('product/forcedelete/{id}',[ProductController::class,'forcedelete'])->name('product.forcedelete');
    Route::get('product/delete-image/{id}',[ProductController::class,'deleteImage'])->name('delete.deleteImage');


    // Blog Table

    Route::get('blog',[BlogController::class,'index'])->name('blog.index');
    Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::post('blog',[BlogController::class,'store'])->name('blog.store');
    Route::get('blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
    Route::put('blog/{id}',[BlogController::class,'update'])->name('blog.update');
    Route::delete('blog/{id}',[BlogController::class,'delete'])->name('blog.delete');
    Route::get('blog/trashed',[BlogController::class,'trashed'])->name('blog.trashed');
    Route::get('blog/restore/{id}',[BlogController::class,'restore'])->name('blog.restore');
    Route::get('blog/forcedelete/{id}',[BlogController::class,'forcedelete'])->name('blog.forcedelete');

    /** Quản lí đơn hàng */
    Route::get('order',[AdminOrderController::class,'index'])->name('order.index');
    Route::get('order/detail/{id}',[AdminOrderController::class,'detail'])->name('admin.order.detail');
    Route::post('order/status/{id}',[AdminOrderController::class,'status'])->name('admin.order.status');

});


Route::group(['prefix' => 'customer'], function() {
    Route::get('login',[CustomerController::class,'login'])->name('customer.login');
    Route::post('login',[CustomerController::class,'check_login']);

    Route::get('register',[CustomerController::class,'register'])->name('customer.register');
    Route::post('register',[CustomerController::class,'add_customer']);

    Route::get('logout',[CustomerController::class,'logout'])->name('customer.logout');

    Route::get('forgot_password',[CustomerController::class,'forgot_password'])->name('customer.forgot_password');
    Route::post('forgot_password',[CustomerController::class,'forgot_password_reset']);

    Route::get('profile',[CustomerController::class,'profile'])->name('customer.profile')->middleware('cus_auth');
    Route::post('profile',[CustomerController::class,'update_profile'])->middleware('cus_auth');

    Route::post('comment/{product_id}',[HomeController::class,'post_comment'])->name('client.comment')->middleware('cus_auth');


});

Route::group(['prefix' => 'cart'], function() {
    Route::get('add/{id}',[CartController::class,'add'])->name('cart.add');
    Route::get('remove/{id}',[CartController::class,'remove'])->name('cart.remove');
    Route::get('update/{id}',[CartController::class,'update'])->name('cart.update');
    Route::get('clear',[CartController::class,'clear'])->name('cart.clear');
    Route::get('view',[CartController::class,'view'])->name('cart.view');
   
});

Route::group(['prefix' => 'order', 'middleware' => 'cus_auth'], function() {
    Route::get('checkout',[OrderController::class,'checkout'])->name('order.checkout');
    Route::post('checkout',[OrderController::class,'post_checkout']);
    Route::get('history',[OrderController::class,'history'])->name('order.history');
    Route::get('detail/{id}',[OrderController::class,'detail'])->name('order.detail');
    Route::get('pdf/{id}',[OrderController::class,'pdf'])->name('order.pdf');
    Route::get('success',[OrderController::class,'success'])->name('order.success');
    Route::get('error',[OrderController::class,'error'])->name('order.error');
    Route::get('confirm/{token}',[OrderController::class,'confirm'])->name('order.confirm');

});

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'check_login']);


Route::get('admin/register',[AdminController::class,'register'])->name('admin.register');
Route::post('admin/register',[AdminController::class,'check_register']);



