<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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
Route::get('/shop', [ProductController::class, 'index']);

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

Auth::routes();



Route::get('/products/{id}', [ProductController::class, 'productDetail'])->name('productdetail');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// logout route
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');