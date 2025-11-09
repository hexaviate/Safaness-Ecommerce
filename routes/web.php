<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\WebCategoryController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/admin', function () {
    return view('admin.admin');
})->name('dashboard');

Route::resource('category', WebCategoryController::class);
Route::resource('subCategory', SubCategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('productImage', ProductImageController::class);
Route::resource('transaction', TransactionController::class);

Route::get('login', function () {
    return view('user.auth.login');
})->name('login');

Route::get('register', function () {
    return view('user.auth.register');
})->name('register');


// Route::get('login', [AuthController::class, 'viewLogin']);
// Route::get('login', [AuthController::class, 'viewSignUp']);
Route::post('prosesLogin', [AuthController::class, 'signInBuyer'])->name('prosesLogin');
Route::post('prosesRegister', [AuthController::class, 'signUpBuyer'])->name('prosesRegister');

Route::resource('product', \App\Http\Controllers\Web\ProductController::class);


