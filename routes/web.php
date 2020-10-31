<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Seller\CategoryController;
use App\Http\Controllers\Seller\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Seller\OrdersController;

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

Route::get('/', [GuestController::class, 'index'])->name('guest-index');
Route::post('/find/', [GuestController::class, 'find'])->name('guest-find');
Route::get('/show/{slug}', [GuestController::class, 'show'])->name('guest-show');
Route::post('/cart/add-cart', [GuestController::class, 'store'])->name('list-cart-add');
Route::get('/cart/{session_id}', [GuestController::class, 'listCart'])->name('list-cart');
Route::get('/cart/delete/{id}/{session_id}', [GuestController::class, 'destroy'])->name('list-cart-delete');
Route::post('/cart-update', [GuestController::class, 'update'])->name('front.update_cart');
Route::get('/reset-password', [GuestController::class, 'resetPassword'])->name('reset-password');


Auth::routes();

Route::middleware(['auth', 'Seller'])->group(function () {
    Route::get('/seller', [HomeController::class, 'handleSeller'])->name('seller');
    Route::get('/seller/category', [CategoryController::class, 'index'])->name('category-index');
    Route::get('/seller/category-create', [CategoryController::class, 'create'])->name('category-create');
    Route::post('/seller/category-store', [CategoryController::class, 'store'])->name('category-store');
    Route::patch('/seller/category-update/{id}', [CategoryController::class, 'update'])->name('category-update');
    Route::delete('/seller/category-delete/{id}', [CategoryController::class, 'destroy'])->name('category-delete');

    Route::get('/seller/product', [ProductController::class, 'index'])->name('product-index');
    Route::get('/seller/product-create', [ProductController::class, 'create'])->name('product-create');
    Route::post('/seller/product-store', [ProductController::class, 'store'])->name('product-store');
    Route::get('/seller/product-edit/{id}', [ProductController::class, 'edit'])->name('product-edit');
    Route::patch('/seller/product-update/{id}', [ProductController::class, 'update'])->name('product-update');
    Route::get('/seller/product-delete/{id}', [ProductController::class, 'destroy'])->name('product-delete');


    Route::get('/seller/order', [OrdersController::class, 'index'])->name('order-index');
    Route::post('/seller/update-status', [OrdersController::class, 'updateStatus'])->name('update-status');
    Route::get('/seller/invoice-order', [OrdersController::class, 'invoiceOrder'])->name('invoice-order');
    Route::get('/seller/report', [OrdersController::class, 'report'])->name('invoice-report');


});

Route::middleware(['auth', 'Customer'])->group(function () {
    Route::get('/customer', [HomeController::class, 'handleCustomer'])->name('customer');
    Route::get('/customer/index', [CustomerController::class, 'index'])->name('customer-index');
    Route::get('/customer/add-whislist/{id}/{user_id}', [CustomerController::class, 'addWhislits'])->name('customer-add-whislist');
    Route::get('/customer/list-whislist/{user_id}/{session_id}', [CustomerController::class, 'showWhislits'])->name('customer-show-whislist');
    Route::get('/customer/delete-whislist/{id}/{session_id}', [CustomerController::class, 'destroy'])->name('customer-delete-whislist');
    Route::get('/customer/add-cart/{id}/{session_id}', [CustomerController::class, 'addCartFormWhislist'])->name('customer-add-cart');
    Route::get('/customer/account/{user_id}/{session_id}', [CustomerController::class, 'accountCostumer'])->name('customer-account');
    Route::patch('/customer/account-update', [CustomerController::class, 'updateCustomer'])->name('customer-account-update');


    Route::get('/customer/order/{id}/{session_id}', [OrderController::class, 'order'])->name('customer-order');
    Route::post('/customer/order-save/{user_id}/{session_id}', [OrderController::class, 'storeOrderDetail'])->name('customer-order-save');
    Route::get('/customer/end-order/{user_id}/{session_id}', [OrderController::class, 'endOrder'])->name('customer-end-order');
    Route::get('/customer/order-list/{user_id}/{session_id}', [OrderController::class, 'orderList'])->name('customer-order-list');
});

//Route::get('customer', [HomeController::class, 'handleCustomer'])->name('customer')->middleware('Customer');


//Route::get('seller', [HomeController::class, 'handleSeller'])->name('seller')->middleware('Seller');
