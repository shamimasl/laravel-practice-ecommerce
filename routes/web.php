<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientMessageController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::post('/send/message', [FrontendController::class, 'sendMessage']);
Route::get('/', [FrontendController::class, 'index']);
Route::get('/product/details/{id}', [FrontendController::class, 'product_details']);
Route::get('/shop', [FrontendController::class, 'shop']);
Route::get('/shop/category/{category_id}', [FrontendController::class, 'shop_category']);
Route::get('/search', [FrontendController::class, 'search']);

Auth::routes();
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::post('/user/insert', [App\Http\Controllers\HomeController::class, 'userinsert'])->name('userinsert');
Route::get('/download/invoice/{id}', [App\Http\Controllers\HomeController::class, 'downloadinvoice']);
Route::get('/send/invoice/{id}', [App\Http\Controllers\HomeController::class, 'sendinvoice']);
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
Route::post('/getCityList', [CartController::class, 'getCityList']);
Route::get('/checkout', [CartController::class, 'checkout']);
Route::get('/cart/{coupon_name}', [CartController::class, 'cart']);
Route::post('update/cart', [CartController::class, 'updatecart']);
Route::get('/coupon', [CouponController::class, 'index']);
Route::post('/coupon/insert', [CouponController::class, 'insert'])->name('couponinsert');
Route::post('order/create', [OrderController::class, 'ordercreate']);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/online/payment', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

Route::post('/email/subscribe', [SubscriberController::class, 'insert']);
Route::post('/send/email', [SubscriberController::class, 'send']);
Route::get('/newsletter', [SubscriberController::class, 'index']);
Route::get('/client/message', [ClientMessageController::class, 'index']);
Route::post('/message/insert', [ClientMessageController::class, 'insert']);
Route::get('/story', [StoryController::class, 'index']);
Route::get('footer/info', [FooterController::class, 'index']);
Route::post('/info/insert', [FooterController::class, 'insert']);
Route::get('/info/edit/{id}', [FooterController::class, 'edit']);
Route::post('/info/update/{id}', [FooterController::class, 'update']);
