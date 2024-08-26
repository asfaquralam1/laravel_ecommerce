<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
Route::get('admin/category', [AdminController::class, 'category'])->name('admin/category');
Route::get('admin/manage-category', [AdminController::class, 'manage_category'])->name('admin/manage-category');
Route::post('admin/add-category', [AdminController::class, 'add_category'])->name('admin/add-category');
Route::get('admin/edit-category/{id}', [AdminController::class, 'edit_category'])->name('admin/edit-category');
Route::post('admin/update-category/{id}', [AdminController::class, 'update_category'])->name('admin/update-category');
Route::delete('admin/destory-category/{id}', [AdminController::class, 'delete_category'])->name('admin/destory-category');
Route::post('admin/category/status/{status}/{id}', [AdminController::class, 'status'])->name('admin/status-category');
//product
Route::get('admin/product', [AdminController::class, 'product'])->name('admin/product');
Route::get('admin/manage-product', [AdminController::class, 'manage_product'])->name('admin/manage-product');
Route::post('admin/add-product', [AdminController::class, 'add_product'])->name('admin/add-product');
Route::get('admin/edit-product/{id}', [AdminController::class, 'edit_product'])->name('admin/edit-product');
Route::post('admin/update-product/{id}', [AdminController::class, 'update_product'])->name('admin/update-product');
Route::delete('admin/destory-product/{id}', [AdminController::class, 'delete_product'])->name('admin/destory-product');
//Frontend
Route::get('/products', [HomeController::class, 'product'])->name('product');
Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');
Route::post('/add_cart/{id}', [CartController::class, 'add_cart'])->name('add_cart');
Route::get('/show_cart', [CartController::class, 'show_cart'])->name('cart.show');
Route::delete('/delete_cart/{id}', [CartController::class, 'delete_cart'])->name('cart.delete');

Route::post('/cart/increase', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');



Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');


Route::post('palce-order/{id}', [OrderController::class, 'create'])->name('palce.order');
