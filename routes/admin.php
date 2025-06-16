<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('admin', [AdminController::class, 'index'])->name('admin.login');
Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('admin/categories', [CategoryController::class, 'index'])->name('admin.category');
Route::get('admin/manage-category', [CategoryController::class, 'create'])->name('admin.manage.category');
Route::post('admin/add-category', [CategoryController::class, 'store'])->name('admin.add.category');
Route::get('admin/edit-category/{id}', [CategoryController::class, 'edit'])->name('admin.edit.category');
Route::post('admin/update-category/{id}', [CategoryController::class, 'update'])->name('admin.update.category');
Route::delete('admin/destory-category/{id}', [CategoryController::class, 'delete'])->name('admin.destory.category');
Route::post('admin/category/status/{status}/{id}', [CategoryController::class, 'status'])->name('admin.status.category');
//product
Route::get('admin/products', [ProductController::class, 'product'])->name('admin.product');
Route::get('admin/manage-product', [ProductController::class, 'manage_product'])->name('admin.manage.product');
Route::post('admin/add-product', [ProductController::class, 'add_product'])->name('admin.add.product');
Route::get('admin/edit-product/{id}', [ProductController::class, 'edit_product'])->name('admin.edit.product');
Route::post('admin/update-product/{id}', [ProductController::class, 'update_product'])->name('admin.update.product');
Route::get('admin/printbarcode/product', [ProductController::class, 'printbarcode'])->name('admin.printbarcode.product');
Route::get('admin/product/printbarcode/pdf/{id}', [ProductController::class, 'generateBarcodePdf'])->name('admin.product.barcode.pdf');
Route::delete('admin/destory-product/{id}', [ProductController::class, 'delete_product'])->name('admin.destory.product');
//order
Route::get('admin/order', [AdminController::class, 'order'])->name('admin.order');
// });
