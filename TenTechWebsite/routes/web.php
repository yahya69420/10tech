<?php

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
// gets the index.php and returns to the '/shop' url
Route::get('/', function () {
    return redirect('/shop');
});

// default url that returns the 'home' page that is the shop
Route::get('/shop', function () {
    return view('welcome');
});

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
