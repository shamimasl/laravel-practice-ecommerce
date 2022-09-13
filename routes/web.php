<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('about', [FrontendController::class, 'about']);
Route::get('contact', [FrontendController::class, 'contact']);
Route::get('protfolio', [FrontendController::class, 'protfolio']);
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{id}', [FrontendController::class, 'product_details']);
Route::get('/shop', [FrontendController::class, 'shop']);
Route::get('/shop/category/{category_id}', [FrontendController::class, 'shop_category']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/insert', [App\Http\Controllers\HomeController::class, 'userinsert'])->name('userinsert');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/category/insert', [App\Http\Controllers\CategoryController::class, 'insert']);
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);
Route::get('/subcategory', [App\Http\Controllers\SubCategoryController::class, 'index']);
Route::post('/subcategory/insert', [App\Http\Controllers\SubCategoryController::class, 'insert']);
Route::get('/subcategory/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'delete']);
Route::get('/subcategory/edit/{id}', [App\Http\Controllers\SubCategoryController::class, 'edit']);
Route::post('/subcategory/update/{id}', [App\Http\Controllers\SubCategoryController::class, 'update']);
Route::get('/subcategory/restore/{id}', [App\Http\Controllers\SubCategoryController::class, 'restore']);
Route::get('/subcategory/permanent/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'permanentdelete']);
Route::post('/subcategory/mark/delete', [App\Http\Controllers\SubCategoryController::class, 'markdelete']);
Route::get('/subcategory/all/delete', [App\Http\Controllers\SubCategoryController::class, 'alldelete']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile/name/change', [ProfileController::class, 'namechange']);
Route::post('/profile/password/change', [ProfileController::class, 'passwordchange']);
Route::post('/profile/photo/change', [ProfileController::class, 'photochange']);
Route::get('/product', [ProductController::class, 'index']);
Route::post('/product/insert', [ProductController::class, 'insert']);
Route::post('/add/to/cart', [CartController::class, 'addtocart']);
Route::get('/cart/delete/{cart_id}', [CartController::class, 'cartdelete']);
Route::get('/cart', [CartController::class, 'cart']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::get('/cart/{coupon_name}', [CartController::class, 'cart']);
Route::post('update/cart', [CartController::class, 'updatecart']);
Route::get('/coupon', [CouponController::class, 'index']);
Route::post('/coupon/insert', [CouponController::class, 'insert'])->name('couponinsert');
