<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FilterController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\LangController;
use App\Http\Controllers\Frontend\PrivacyController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use Auth;

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

require __DIR__.'/admin.php';

// Fronend ecommerce
Route::get('/', [FrontendController::class, 'index'])->name('ecommerce');

Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');

Route::get('product_details/{id}', [FrontendController::class, 'ProductDetails'])->name('product_details');

// Cart Routes
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');

// Wish list Routes
Route::get('wishlist', [WishlistController::class, 'wishlist'])->name('wishlist.list');
Route::get('add-to-wishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('add.to.wishlist');
Route::delete('remove-from-wishlist', [WishlistController::class, 'remove'])->name('remove.from.wishlist');

Route::get('filterlist', [FilterController::class, 'filterList'])->name('filter.list');

// Account Auth
Route::get('register_user', [LoginController::class, 'register'])->name('register');
Route::post('register_user', [LoginController::class, 'register_user'])->name('register_user');

Route::get('signin', [LoginController::class, 'login'])->name('signin');
Route::get('forget_pwd', [LoginController::class, 'forget_pwd'])->name('forget_pwd');
Route::post('forget_pwd_user', [LoginController::class, 'forgetPwdUser'])->name('forget_pwd_user');

Route::get('reset-password/{otp}', [LoginController::class, 'resetPassword'])->name('reset-password');
Route::post('reset_password_email/{otp}', [LoginController::class, 'resetPasswordPost'])->name('reset_password_email');


// Wish list Routes
Route::get('checkoutlist', [CheckoutController::class, 'checkoutlist'])->name('checkoutlist');
Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('ordersuccess', [CheckoutController::class, 'orderSuccess'])->name('ordersuccess');
Route::post('/charge', [CheckoutController::class, 'charge'])->name('charge');

// Category Routes
Route::get('categorypage/{id}', [FrontendController::class, 'category'])->name('categorypage');
Route::get('subcategory/{id}', [FrontendController::class, 'subcategory'])->name('subcategory');

Route::post('sendcontactus','Admin\MailController@sendContactUs')->name('sendcontactus');
Route::post('sendregister','Admin\MailController@sendRegister')->name('sendregister');

Route::get('search', [FrontendController::class, 'searchItem'])->name('search');

Route::get('aboutus', [FrontendController::class, 'aboutPage'])->name('aboutus');
Route::get('contactus', [FrontendController::class, 'contactUsPage'])->name('contactus');

Route::get('addressdelver', [FrontendController::class, 'addressDelver'])->name('addressdelver');


// item ajax load Routes
Route::get('item/loaddata', [FrontendController::class, 'itemDataAjaxload'])->name('itemDataAjaxload');
Route::post('item/loaddata', [FrontendController::class, 'itemDataAjaxload'])->name('itemDataAjaxload');

// Home ajax load Routes
Route::get('homeloaddata', [FrontendController::class, 'homeDataAjaxload'])->name('homeDataAjaxload');
Route::post('homeloaddata', [FrontendController::class, 'homeDataAjaxload'])->name('homeDataAjaxload');

Route::get('privacy-policy', [PrivacyController::class, 'index']);
Route::get('terms-condition', [PrivacyController::class, 'terms']);
Route::get('about-us', [AboutController::class, 'index']);

Auth::routes();
Route::get("/login",[UserController::class,'index'])->name('login');
Route::post("/login",[UserController::class,'login'])->name('login_user');

Route::get("/logout",[UserController::class,'logout'])->name('logout');


// Google Login URL
Route::prefix('google')->group( function(){
    Route::get('auth', [UserController::class, 'redirectToGoogle'])->name('redirectToGoogle');
    Route::get('callback', [UserController::class, 'handleGoogleCallback'])->name('handleGoogleCallback');
});

// Facebook Login URL
Route::prefix('facebook')->group( function(){
    Route::get('auth', [UserController::class, 'loginUsingFacebook'])->name('loginUsingFacebook');
    Route::get('callback', [UserController::class, 'callbackFromFacebook'])->name('callbackFromFacebook');
});


Route::get('filterAjax', [FilterController::class, 'filterAjax'])->name('filterAjax');
Route::post("/login_user",[UserController::class,'login'])->name('login_user');


Route::get('firebase', [NotificationController::class, 'firebase'])->name('firebase');


