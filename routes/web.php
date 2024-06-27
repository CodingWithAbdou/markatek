<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeDashController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\CheckoutEventController;
use App\Http\Controllers\Front\ProductPageController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\TermController;
use App\Http\Controllers\Front\TrackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReorderController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switchLang');

Route::get('/', [HomeController::class, 'index'])->name('main');
Route::get('show/{category}/products', [ProductPageController::class, 'products'])->name('product.index');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/callback', [CheckoutController::class, 'callback'])->name('fatoorah.callback');
Route::get('/error', [CheckoutController::class, 'error'])->name('fatoorah.error');

Route::post('/search', [SearchController::class, 'search'])->name('search.search');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::get('/track', [TrackController::class, 'index'])->name('track.index');
Route::post('/track', [TrackController::class, 'search'])->name('track.search');

Route::get('/terms', [TermController::class, 'index'])->name('terms.index');


Route::post('/coupon/apply', [CheckoutEventController::class, 'applyCopoun'])->name('coupon.apply');
Route::post('/place/get', [CheckoutEventController::class, 'getPlace'])->name('place.get');
Route::post('/place/change', [CheckoutEventController::class, 'changePlace'])->name('place.change');


Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
    //auth
    Route::get('login', [LoginController::class, 'index'])->name('dashboard.login.index');
    Route::post('admin/login/submit', [LoginController::class, 'login'])->name('dashboard.login.form');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [HomeDashController::class, 'index'])->name('dashboard.home');

    //logout
    Route::get('logout', [LoginController::class, 'logout'])->name('dashboard.logout');

    // item order
    Route::get('/{segment}/re-order', [ReorderController::class, 'index'])->name('dashboard.reorder.index');
    Route::post('/re-order/update', [ReorderController::class, 'update'])->name('dashboard.reorder.update');

    //profile
    Route::get('profile', [ProfileController::class, 'index'])->name('dashboard.profile.index');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('dashboard.profile.update');
    Route::get('password', [ProfileController::class, 'password'])->name('dashboard.password.index');
    Route::post('password/change', [ProfileController::class, 'update_password'])->name('dashboard.password.update');

    //users
    Route::get('users', [UserController::class, 'index'])->name('dashboard.users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('dashboard.users.create');
    Route::post('users/store', [UserController::class, 'store'])->name('dashboard.users.store');
    Route::get('users/{obj}/edit', [UserController::class, 'edit'])->name('dashboard.users.edit');
    Route::post('users/{obj}/update', [UserController::class, 'update'])->name('dashboard.users.update');
    Route::delete('users/{obj}/delete', [UserController::class, 'destroy'])->name('dashboard.users.destroy');

    //settings
    Route::get('/settings', [SettingController::class, 'index'])->name('dashboard.settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('dashboard.settings.update');

    //banners
    Route::get('banners', [BannerController::class, 'index'])->name('dashboard.banners.index');
    Route::get('banners/create', [BannerController::class, 'create'])->name('dashboard.banners.create');
    Route::post('banners/store', [BannerController::class, 'store'])->name('dashboard.banners.store');
    Route::get('banners/{obj}/edit', [BannerController::class, 'edit'])->name('dashboard.banners.edit');
    Route::post('banners/{obj}/update', [BannerController::class, 'update'])->name('dashboard.banners.update');
    Route::delete('banners/{obj}/delete', [BannerController::class, 'destroy'])->name('dashboard.banners.destroy');

    //categories
    Route::get('categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');
    Route::get('categories/create', [CategoryController::class, 'create'])->name('dashboard.categories.create');
    Route::post('categories/store', [CategoryController::class, 'store'])->name('dashboard.categories.store');
    Route::get('categories/{obj}/edit', [CategoryController::class, 'edit'])->name('dashboard.categories.edit');
    Route::post('categories/{obj}/update', [CategoryController::class, 'update'])->name('dashboard.categories.update');
    Route::delete('categories/{obj}/delete', [CategoryController::class, 'destroy'])->name('dashboard.categories.destroy');

    //products
    Route::get('products', [ProductController::class, 'index'])->name('dashboard.products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('dashboard.products.create');
    Route::post('products/store', [ProductController::class, 'store'])->name('dashboard.products.store');
    Route::get('products/{obj}/edit', [ProductController::class, 'edit'])->name('dashboard.products.edit');
    Route::post('products/{obj}/update', [ProductController::class, 'update'])->name('dashboard.products.update');
    Route::delete('products/{obj}/delete', [ProductController::class, 'destroy'])->name('dashboard.products.destroy');

    //places
    Route::get('places', [PlaceController::class, 'index'])->name('dashboard.places.index');
    Route::get('places/create', [PlaceController::class, 'create'])->name('dashboard.places.create');
    Route::post('places/store', [PlaceController::class, 'store'])->name('dashboard.places.store');
    Route::get('places/{obj}/edit', [PlaceController::class, 'edit'])->name('dashboard.places.edit');
    Route::post('places/{obj}/update', [PlaceController::class, 'update'])->name('dashboard.places.update');
    Route::delete('places/{obj}/delete', [PlaceController::class, 'destroy'])->name('dashboard.places.destroy');

    //copouns
    Route::get('coupons', [CouponController::class, 'index'])->name('dashboard.coupons.index');
    Route::get('coupons/create', [CouponController::class, 'create'])->name('dashboard.coupons.create');
    Route::post('coupons/store', [CouponController::class, 'store'])->name('dashboard.coupons.store');
    Route::get('coupons/{obj}/edit', [CouponController::class, 'edit'])->name('dashboard.coupons.edit');
    Route::post('coupons/{obj}/update', [CouponController::class, 'update'])->name('dashboard.coupons.update');
    Route::delete('coupons/{obj}/delete', [CouponController::class, 'destroy'])->name('dashboard.coupons.destroy');

    //orders
    Route::get('orders', [OrderController::class, 'index'])->name('dashboard.orders.index');
    Route::get('orders/{obj}/edit', [OrderController::class, 'edit'])->name('dashboard.orders.edit');
    Route::post('orders/{obj}/update', [OrderController::class, 'update'])->name('dashboard.orders.update');
    Route::delete('orders/{obj}/delete', [OrderController::class, 'destroy'])->name('dashboard.orders.destroy');
});
