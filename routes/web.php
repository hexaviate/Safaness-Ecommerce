<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\WebCategoryController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/dashboard', function () {
    return view('admin.components.dahboard.index');
})->name('dashboard');

Route::resource('category', WebCategoryController::class);
Route::resource('subCategory', SubCategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('productImage', ProductImageController::class);
Route::resource('transaction', TransactionController::class);

Route::post('validatePayment/{id}', [TransactionController::class, 'validatePayment'])->name('validatePayment');

