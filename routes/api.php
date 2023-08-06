<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
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

// Route::group(['middleware' => 'admin_auth'], function () {
//     Route::get('admin/color', [ColorController::class, 'index'])->name('admin/color');
//     Route::get('admin/color/manage-color', [ColorController::class, 'show'])->name('admin/manage-color');
//     Route::post('admin/color/add-color', [ColorController::class, 'create'])->name('color.add');
//     Route::get('admin/color/edit-color/{id}', [ColorController::class, 'edit'])->name('color.edit');
//     Route::post('admin/color/update-color/{id}', [ColorController::class, 'update'])->name('color.update');
//     Route::get('admin/color/delete-color/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
//     Route::get('admin/color/status/{status}/{id}', [ColorController::class, 'status'])->name('color.status');
// });
