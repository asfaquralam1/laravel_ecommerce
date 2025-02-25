<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('admin', [AdminController::class, 'index'])->name('admin.login');
Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});
//Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/category', [AdminController::class, 'category'])->name('admin.category');
Route::get('admin/manage-category', [AdminController::class, 'manage_category'])->name('admin.manage.category');
Route::post('admin/add-category', [AdminController::class, 'add_category'])->name('admin.add.category');
Route::get('admin/edit-category/{id}', [AdminController::class, 'edit_category'])->name('admin.edit.category');
Route::post('admin/update-category/{id}', [AdminController::class, 'update_category'])->name('admin.update.category');
Route::delete('admin/destory-category/{id}', [AdminController::class, 'delete_category'])->name('admin.destory.category');
Route::post('admin/category/status/{status}/{id}', [AdminController::class, 'status'])->name('admin.status.category');
//product
Route::get('admin/product', [AdminController::class, 'product'])->name('admin.product');
Route::get('admin/manage-product', [AdminController::class, 'manage_product'])->name('admin.manage.product');
Route::post('admin/add-product', [AdminController::class, 'add_product'])->name('admin.add.product');
Route::get('admin/edit-product/{id}', [AdminController::class, 'edit_product'])->name('admin.edit.product');
Route::post('admin/update-product/{id}', [AdminController::class, 'update_product'])->name('admin.update.product');
Route::get('admin/printbarcode/product', [AdminController::class, 'printbarcode'])->name('admin.printbarcode.product');
Route::get('admin/product/printbarcode/pdf/{id}', [AdminController::class, 'generateBarcodePdf'])->name('admin.product.barcode.pdf');
Route::delete('admin/destory-product/{id}', [AdminController::class, 'delete_product'])->name('admin.destory.product');
//order
Route::get('admin/order', [AdminController::class, 'order'])->name('admin.order');
// });
