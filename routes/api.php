<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\CouponApiController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductApiController;
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
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthApiController::class, 'login']);
    Route::post('/register', [AuthApiController::class, 'register']);
});
Route::get('/products', [ProductApiController::class, 'getProducts']);
Route::get('/product/{id}', [ProductApiController::class, 'singleProduct']);
Route::post('/product/search', [ProductApiController::class, 'search']);
Route::get('/category', [CategoryApiController::class, 'getCategory']);
Route::get('/category/subcategory/{category_id}', [CategoryApiController::class, 'categoryWiseSubCategory']);
Route::get('/category/product/{category_id}', [CategoryApiController::class, 'categoryWiseProduct']);
Route::get('/subcategory/product/{category_id}', [CategoryApiController::class, 'subCategoryWiseProduct']);
Route::get('/coupon', [CouponApiController::class, 'getCoupon']);
