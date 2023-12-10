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


Route::get('/checkout', function(){
    return view('checkout');
});

Route::get('/header', function(){
    return view('header');
});

Route::get('/complete', function(){
    return view('complete');
});

Route::get('/mobile', function () {
    return view('Mobile');
});
Route::get('/Laptop', function () {
    return view('Laptop');
});
Route::get('/Monitor', function () {
    return view('Monitor');
});
Route::get('/Tablet', function () {
    return view('Tablet');
});
Route::get('/Console', function () {
    return view('Console');
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

// basket route
// Route::get('/basket', [App\Http\Controllers\BasketController::class, 'index'])->name('basket');

// product detail route
Route::get('/productdetail/{id}', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('productdetail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// logout route
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
