<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('login');
    Route::post('/authenticate', [AdminController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('dashboard');

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // category
        Route::get('/categories', [CategoryController::class, 'index'])->name('category');
        Route::get('/manage-category', [CategoryController::class, 'create'])->name('manage.category');
        Route::post('/add-category', [CategoryController::class, 'store'])->name('add.category');
        Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
        Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
        Route::delete('/destory-category/{id}', [CategoryController::class, 'delete'])->name('destory.category');
        Route::post('/category/status/{status}/{id}', [CategoryController::class, 'status'])->name('status.category');

        //product
        Route::get('/products', [ProductController::class, 'product'])->name('product');
        Route::get('/manage-product', [ProductController::class, 'manage_product'])->name('manage.product');
        Route::post('/add-product', [ProductController::class, 'add_product'])->name('add.product');
        Route::get('/edit-product/{id}', [ProductController::class, 'edit_product'])->name('edit.product');
        Route::post('/update-product/{id}', [ProductController::class, 'update_product'])->name('update.product');
        Route::get('/printbarcode/product', [ProductController::class, 'printbarcode'])->name('printbarcode.product');
        Route::get('/product/printbarcode/pdf/{id}', [ProductController::class, 'generateBarcodePdf'])->name('product.barcode.pdf');
        Route::delete('/destory-product/{id}', [ProductController::class, 'delete_product'])->name('destory.product');
        //order
        Route::get('/orders', [AdminController::class, 'order'])->name('order');
    });
});
