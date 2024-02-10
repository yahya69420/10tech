<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// gets the index.php and returns to the '/shop' url
Route::get('/', function () {
    return redirect('/shop');
});

// default url that returns the 'home' page that is the shop
Route::get('/shop', [App\Http\Controllers\ProductController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/header', function(){
    return view('header');
});

Route::get('/complete', function(){
    return view('complete');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/Laptop', [App\Http\Controllers\ProductController::class, 'showAllLaptops'])->name('laptop');

Route::get('/Tablet', [App\Http\Controllers\ProductController::class, 'showAllTablets'])->name('tablet');

Route::get('/Console', [App\Http\Controllers\ProductController::class, 'showAllConsoles'])->name('console');

Route::get('/Mobile', [App\Http\Controllers\ProductController::class, 'showAllMobiles'])->name('mobile');

Route::get('/Monitor', [App\Http\Controllers\ProductController::class, 'showAllMonitors'])->name('monitor');

Auth::routes();

//basket route for the view
Route::get('/basket', [App\Http\Controllers\BasketController::class, 'index'])->name('basket');

// route for adding product to basket
Route::post('/add_to_basket', [App\Http\Controllers\BasketController::class, 'addToBasket'])->name('add_to_basket');

// route for removing product from basket
Route::get('/remove_from_basket/{cart_id}', [App\Http\Controllers\BasketController::class, 'removeFromBasket'])->name('remove_from_basket');

// refactored checkout route to use the checkout method in the BasketController
Route::get('/checkout', [App\Http\Controllers\BasketController::class, 'checkout'])->name('checkout');

// product detail route
Route::get('/productdetail/{id}', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('productdetail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// logout route
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/settings', [App\Http\Controllers\UserSettingsController::class, 'index'])->name('settings');

Route::post('/update-password', [App\Http\Controllers\UserSettingsController::class, 'updatePassword'])->name('update-password');

Route::post('/delete-account', [App\Http\Controllers\UserSettingsController::class, 'deleteAccount'])->name('delete-account');