<?php
require 'admin.php';

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SslCommerzPaymentController;
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


//Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/pagenotfound', [HomeController::class, 'pagenotfound'])->name('notfound');

// Route::view('/search', 'search');
Route::get('/search', [HomeController::class, 'search'])->name('search');

//product
Route::get('/products', [HomeController::class, 'product'])->name('product');
Route::get('/product/category/{id}', [HomeController::class, 'category_product'])->name('category.product');
Route::get('/product_details/{id}', [HomeController::class, 'product_details'])->name('product.details');

//Authentication
Route::get('/register', [AuthController::class, 'register_view'])->name('register');
Route::post('/register-user', [AuthController::class, 'register'])->name('user.register');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-user', [AuthController::class, 'login'])->name('user.login');
Route::get('/logout-user', [AuthController::class, 'logout'])->name('user.logout');
Route::post('/logout-user', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/forgot-pass', [AuthController::class,'forgotpass'])->name('user.forgotpass');

//cart
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('checkout', [HomeController::class, 'checkout_view'])->name('checkout');
Route::post('place-order', [HomeController::class, 'place_order'])->name('place.order');
Route::get('/checkout/order/{id}', [HomeController::class, 'checkoutPayment'])->name('checkout.payment');

//user
Route::get('profile', [HomeController::class, 'profile'])->name('profile');
Route::post('update-profile', [HomeController::class, 'update_profile'])->name('update.profile');
Route::post('update-profile', [HomeController::class, 'update_profile'])->name('update.profile');
Route::get('user/order', [HomeController::class, 'user_order'])->name('user.order');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//user-order-pdf
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('pdf');
Route::get('/download-pdf', [PDFController::class, 'downloadPdf'])->name('snappyPdf');

// SSLCOMMERZ Start
Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::get('/task',function(){
    return view('site.pages.task');
});
