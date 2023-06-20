<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function () {
    // Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin/dashboard');
    // Route::get('admin/category',[CategoryController::class,'index'])->name('admin/category');
    // Route::get('admin/manage-category',[CategoryController::class,'manage_category'])->name('admin/manage-category');
    // Route::get('admin/updatepassword',[AdminController::class,'updatepassword'])->name('admin/updatepassword');
    Route::get('admin/logout', function () {
        session()->session()->forget('ADMIN_LOGIN');
        session()->session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Succsessfully');
        return redirect('admin');
    });
});

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin/dashboard');
Route::get('admin/category', [CategoryController::class, 'index'])->name('admin/category');
Route::get('admin/category/manage-category', [CategoryController::class, 'manage_category'])->name('admin/manage-category');
Route::post('admin/category/add-category', [CategoryController::class, 'add_category'])->name('category.add');
Route::get('admin/category/delete-category/{id}', [CategoryController::class, 'delete_category'])->name('category.destroy');
Route::get('admin/category/edit-category/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
Route::post('admin/category/update-category/{id}', [CategoryController::class, 'update_category'])->name('category.update');

