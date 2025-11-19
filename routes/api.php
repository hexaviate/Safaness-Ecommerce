<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\Auth\AuthAdminController;
use App\Http\Controllers\Api\Auth\AuthUserController;
use App\Http\Controllers\Api\BuyerController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PageCartContorller;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductImageController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//*AUTH
//?Admin
Route::post('admin/login', [AuthAdminController::class, 'signIn']);
//?Buyer
Route::post('buyer/register', [AuthUserController::class, 'signUp']);
Route::post('buyer/login', [AuthUserController::class, 'signIn']);
Route::post('buyer/logout', [AuthUserController::class, 'logout']);

//CRUD
//?Admin
//Buyer
Route::get('/admin/buyer', [BuyerController::class, 'listBuyer']);
Route::put('/admin/buyer/{id}', [BuyerController::class, 'updateBuyer']);

//Category
Route::post('/admin/category', [CategoryController::class, 'createCategory']);
Route::get('/admin/category', [CategoryController::class, 'listCategory']);
Route::put('/admin/category/{id}', [CategoryController::class, 'updateCategory']);
Route::delete('/admin/category/{id}', [CategoryController::class, 'deleteCategory']);

//Sub Category and Product
Route::prefix('admin')->group(function () {
    Route::apiResource('subCategory', SubCategoryController::class);
    Route::apiResource('product', ProductController::class);
    Route::apiResource('cart', CartController::class);
    Route::apiResource('transaction', TransactionController::class);
    Route::apiResource('productImages', ProductImageController::class);
});

Route::get('/search-destination', [RajaOngkirController::class, 'searchDestination'])->name('search-destination');
Route::get('/infoCart', [PageCartContorller::class, 'infoCart'])->name('infoCart');
Route::post('/infoCart2', [PageCartContorller::class, 'infoCart2'])->name('infoCart2');
Route::get('/transactionInfo', [PageCartContorller::class, 'transactionInfo'])->name('transactionInfo');
Route::get('/detailTransactionInfo/{id}', [PageCartContorller::class, 'detailTransactionInfo'])->name('detailTransactionInfo');
Route::get('/accountDetail', [AccountController::class, 'accountDetail'])->name('accountDetail');

Route::post('/uploadPayment/{id}', [TransactionController::class, 'submitProof'])->name('uploadPayment');
