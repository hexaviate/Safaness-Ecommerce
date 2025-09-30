<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\WebCategoryController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/admin', function() {
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


Route::get('', function () {
    return view('user.content.card');
})->name('index');


