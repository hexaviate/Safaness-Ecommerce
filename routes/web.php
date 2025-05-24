<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\WebCategoryController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/dashboard', function() {
    return view('admin.admin');
})->name('dashboard');

Route::resource('category', WebCategoryController::class);
Route::resource('subCategory', SubCategoryController::class);
Route::resource('product', ProductController::class);

