<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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
    return view('master');
});

Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin/dashboard');
Route::get('admin/category', [AdminController::class, 'category'])->name('admin/category');
Route::get('admin/manage-category', [AdminController::class, 'manage_category'])->name('admin/manage-category');
Route::post('admin/add-category', [AdminController::class, 'add_category'])->name('admin/add-category');
Route::get('admin/edit-category/{id}', [AdminController::class, 'edit_category'])->name('admin/edit-category');
Route::post('admin/update-category/{id}', [AdminController::class, 'update_category'])->name('admin/update-category');
Route::delete('admin/destory-category/{id}', [AdminController::class, 'delete_category'])->name('admin/destory-category');
Route::post('admin/category/status/{status}/{id}', [AdminController::class, 'status'])->name('admin/status-category');
Route::get('admin/product', [AdminController::class, 'product'])->name('admin/product');


Route::get('/categories', [HomeController::class, 'product'])->name('category');
