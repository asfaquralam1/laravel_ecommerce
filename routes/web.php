<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::get('admin/updatepassword',[AdminController::class,'updatepassword'])->name('admin/updatepassword');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin/dashboard');
    //category
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin/category');
    Route::get('admin/category/manage-category', [CategoryController::class, 'manage_category'])->name('admin/manage-category');
    Route::post('admin/category/add-category', [CategoryController::class, 'add_category'])->name('category.add');
    Route::delete('admin/category/delete-category/{id}', [CategoryController::class, 'delete_category'])->name('category.destroy');
    Route::get('admin/category/edit-category/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
    Route::post('admin/category/update-category/{id}', [CategoryController::class, 'update_category'])->name('category.update');
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status'])->name('category.status');
    //category
    //coupon
    Route::get('admin/coupon', [CouponController::class, 'index'])->name('admin/coupon');
    Route::get('admin/coupon/manage-coupon', [CouponController::class, 'show'])->name('admin/manage-coupon');
    Route::post('admin/coupon/add-coupon', [CouponController::class, 'create'])->name('coupon.add');
    Route::get('admin/coupon/edit-coupon/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
    Route::post('admin/coupon/update-coupon/{id}', [CouponController::class, 'update'])->name('coupon.update');
    Route::get('admin/coupon/delete-coupon/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status'])->name('coupon.status');
    //coupon
    //product
    Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('admin/product/manage-product', [ProductController::class, 'show'])->name('admin.manage-product');
    Route::post('admin/product/add-product', [ProductController::class, 'create'])->name('product.add');
    Route::get('admin/product/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('admin/product/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/product/delete-product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status'])->name('product.status');

    //product
     //size
     Route::get('admin/size', [SizeController::class, 'index'])->name('admin/size');
     Route::get('admin/size/manage-size', [SizeController::class, 'show'])->name('admin/manage-size');
     Route::post('admin/size/add-size', [SizeController::class, 'create'])->name('size/add');
     Route::get('admin/size/edit-size/{id}', [SizeController::class, 'edit'])->name('size.edit');
     Route::post('admin/size/update-size/{id}', [SizeController::class, 'update'])->name('size.update');
     Route::get('admin/size/delete-size/{id}', [SizeController::class, 'destroy'])->name('size.destroy');
     Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status'])->name('coupon.status');
     //size
    //color
      Route::get('admin/color', [ColorController::class, 'index'])->name('admin/color');
      Route::get('admin/color/manage-color', [ColorController::class, 'show'])->name('admin/manage-color');
      Route::post('admin/color/add-color', [ColorController::class, 'create'])->name('color.add');
      Route::get('admin/color/edit-color/{id}', [ColorController::class, 'edit'])->name('color.edit');
      Route::post('admin/color/update-color/{id}', [ColorController::class, 'update'])->name('color.update');
      Route::get('admin/color/delete-color/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
      Route::get('admin/color/status/{status}/{id}', [ColorController::class, 'status'])->name('Color.status');
      //color
    Route::get('admin/logout', function (Request $request) {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Succsessfully');
        return redirect('admin');
    });
});
