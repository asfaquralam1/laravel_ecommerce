<?php

<<<<<<< HEAD
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
=======
>>>>>>> 50c8b35a0d36fbdd34585adf4037d74c314a21d7
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD


Route::get('admin/product', [ProductController::class, 'index'])->name('admin/product');
=======
>>>>>>> 50c8b35a0d36fbdd34585adf4037d74c314a21d7
