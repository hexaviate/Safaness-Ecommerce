<?php

use App\Http\Controllers\Api\Auth\AuthAdminController;
use App\Http\Controllers\Api\Auth\AuthUserController;
use App\Http\Controllers\Api\BuyerController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;
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

//Sub Category
Route::prefix('admin')->group(function () {
    Route::apiResource('subCategory', SubCategoryController::class);
});
