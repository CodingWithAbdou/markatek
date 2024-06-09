<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeDashController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PlaceController;
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



Route::get('/', [HomeController::class, 'index'])->name('main');


Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
    //auth
    Route::get('login', [LoginController::class, 'index'])->name('dashboard.login.index');
    Route::post('admin/login/submit', [LoginController::class, 'login'])->name('dashboard.login.form');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [HomeDashController::class, 'index'])->name('dashboard.home');

    //logout
    Route::get('logout', [LoginController::class, 'logout'])->name('dashboard.logout');


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
});
