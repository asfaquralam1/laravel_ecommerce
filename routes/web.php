<?php
require 'admin.php';

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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

//admin
Route::get('admin/login', [AdminController::class, 'index'])->name('admin.login');
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

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
Route::get('/', [HomeController::class, 'index'])->name('home');

//Register
Route::get('/register', [AuthController::class, 'register_view'])->name('register');
Route::post('/register-user', [AuthController::class, 'register'])->name('user.register');

//login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-user', [AuthController::class, 'login'])->name('user.login');

//logout
Route::get('/logout-user', [AuthController::class, 'logout'])->name('user.logout');
Route::get('profile', [HomeController::class, 'profile'])->name('profile');

//product
Route::get('/products', [HomeController::class, 'product'])->name('product');
Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product_details');

//cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('checkout', [HomeController::class, 'checkout_view'])->name('checkout');
Route::post('place-order', [HomeController::class, 'place_order'])->name('place.order');

//user
Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::post('update-profile', [HomeController::class, 'update_profile'])->name('update.profile');
Route::post('update-profile', [HomeController::class, 'update_profile'])->name('update.profile');
Route::get('user/order', [HomeController::class, 'user_order'])->name('user.order');
