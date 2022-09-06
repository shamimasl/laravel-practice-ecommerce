<?php

use App\Http\Controllers\FrontendController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [FrontendController::class, 'about']);
Route::get('contact', [FrontendController::class, 'contact']);
Route::get('protfolio', [FrontendController::class, 'protfolio']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/category/insert', [App\Http\Controllers\CategoryController::class, 'insert']);
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete']);
Route::get('/subcategory', [App\Http\Controllers\SubCategoryController::class, 'index']);
Route::post('/subcategory/insert', [App\Http\Controllers\SubCategoryController::class, 'insert']);
Route::get('/subcategory/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'delete']);
Route::get('/subcategory/restore/{id}', [App\Http\Controllers\SubCategoryController::class, 'restore']);
Route::get('/subcategory/permanent/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'permanentdelete']);
Route::post('/subcategory/mark/delete', [App\Http\Controllers\SubCategoryController::class, 'markdelete']);
Route::get('/subcategory/all/delete', [App\Http\Controllers\SubCategoryController::class, 'alldelete']);
