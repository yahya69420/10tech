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

// routes/web.php
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WishlistController;

Route::post('/submit-message', [MessageController::class, 'store'])->name('submit.message');

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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/Laptop', [App\Http\Controllers\ProductController::class, 'showAllLaptops'])->name('laptop');

Route::get('/Tablet', [App\Http\Controllers\ProductController::class, 'showAllTablets'])->name('tablet');

Route::get('/Console', [App\Http\Controllers\ProductController::class, 'showAllConsoles'])->name('console');

Route::get('/Mobile', [App\Http\Controllers\ProductController::class, 'showAllMobiles'])->name('mobile');

Route::get('/Monitor', [App\Http\Controllers\ProductController::class, 'showAllMonitors'])->name('monitor');

// route for the search bar data function
Route::get('/getAllProductsList', [App\Http\Controllers\ProductController::class, 'getAllProductsList']);

// Route::post('add-to-wishlist',[WishlistController::class,'add']);
Auth::routes();

//basket route for the view
Route::get('/basket', [App\Http\Controllers\BasketController::class, 'index'])->name('basket');

// route for adding product to basket
Route::post('/add_to_basket', [App\Http\Controllers\BasketController::class, 'addToBasket'])->name('add_to_basket');

// route for removing product from basket
Route::get('/remove_from_basket/{cart_id}', [App\Http\Controllers\BasketController::class, 'removeFromBasket'])->name('remove_from_basket');

// route for applying discount
Route::post('/apply_discount', [App\Http\Controllers\BasketController::class, 'applyDiscount'])->name('apply_discount');

// route for removing discount
Route::post('/remove_discount', [App\Http\Controllers\BasketController::class, 'removeDiscount'])->name('remove_discount');

// refactored checkout route to use the checkout method in the BasketController
Route::get('/checkout', [App\Http\Controllers\BasketController::class, 'checkout'])->name('checkout');

Route::post('/update_cart/{cart_id}', [App\Http\Controllers\BasketController::class, 'updateCart'])->name('update_cart');

// product detail route
Route::get('/productdetail/{id}', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('productdetail');
Route::post('add-rating',[RatingController::class,'add']);
Route::get('add-review/{product_id}/userreview',[ReviewController::class,'add']);
Route::post('add-review/',[ReviewController::class,'create']);
Route::get('edit-review/{product_id}/userreview',[ReviewController::class,'edit']);
Route::put('update-review',[ReviewController::class,'update']);

Route::post('/add-to-wishlist',[WishlistController::class,'add'])->name('add-to-wishlist');
Route::post('delete-wishlist-item',[WishlistController::class, 'deleteitem']);
Route::get('wishlist',[WishlistController::class,'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// logout route
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/settings', [App\Http\Controllers\UserSettingsController::class, 'index'])->name('settings');

Route::post('/update-password', [App\Http\Controllers\UserSettingsController::class, 'updatePassword'])->name('update-password');

Route::post('update-address', [App\Http\Controllers\UserSettingsController::class, 'updateAddress'])->name('update-address');
// delete-address
Route::post('delete-address', [App\Http\Controllers\UserSettingsController::class, 'deleteAddress'])->name('delete-address');

Route::post('/delete-account', [App\Http\Controllers\UserSettingsController::class, 'deleteAccount'])->name('delete-account');

Route::post('/updateProfilePicture', [App\Http\Controllers\UserSettingsController::class, 'updateProfilePicture'])->name('updateProfilePicture');

// Route for the checkout process
Route::post('/completeorder', [App\Http\Controllers\OrdersController::class, 'completeOrder'])->name('completeorder');

Route::post('/addpaymentinfo', [App\Http\Controllers\UserSettingsController::class, 'addPaymentInfo'])->name('addPaymentInfo');

Route::post('/delete-payment-details', [App\Http\Controllers\UserSettingsController::class, 'deletePaymentDetails'])->name('deletePaymentDetails');

Route::get('order-history', [App\Http\Controllers\OrdersController::class, 'orderHistory'])->name('order-history');

// Route for the order details page
Route::post('order-details/{id}', [App\Http\Controllers\OrdersController::class, 'orderDetails'])->name('order-details');

Route::delete('cancel-order/{id}', [App\Http\Controllers\OrdersController::class, 'cancelOrder'])->name('delete-order');

// Admin routes

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard')->middleware('admin');
// Route::get('/admin/adminheader', [App\Http\Controllers\AdminController::class, 'adminheader'])->name('admin.adminheader');
Route::get('/admin/admincust', [App\Http\Controllers\AdminController::class, 'admincust'])->name('admin.admincust')->middleware('admin');
Route::get('admin/adminproducts',[App\Http\Controllers\AdminController::class, 'adminproducts'])->name('admin.adminproducts')->middleware('admin');
Route::post('/admin/adduser', [AdminController::class, 'addUser'])->name('admin.adduser')->middleware('admin');
Route::delete('/admin/removeuser/{id}', [AdminController::class, 'removeUser'])->name('admin.removeuser')->middleware('admin');
Route::put('/admin/edituser/{id}', [AdminController::class, 'editUser'])->name('admin.edituser')->middleware('admin');
Route::post('/admin/adminproducts/add-product', [App\Http\Controllers\AdminController::class, 'addNewProduct'])->name('add-new-product')->middleware('admin');
Route::post('/admin/adminproducts/edit-product', [App\Http\Controllers\AdminController::class, 'editNewProduct'])->name('edit-new-product')->middleware('admin');
Route::post('/admin/adminproducts/remove-product', [App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('delete-product')->middleware('admin');