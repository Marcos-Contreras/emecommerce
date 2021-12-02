<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use APP\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEnd\FrontendController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\CheckoutController;
use App\Http\Controllers\FrontEnd\UserController;
use App\Http\Controllers\FrontEnd\WishlistController;
use App\Models\Order;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [frontendcontroller::class, 'category']);
Route::get('view-category/{slug}', [frontendcontroller::class, 'viewcategory']);
Route::get('category/{cate_slug}/{prod_slug}', [FrontendController::class, 'productview']);

Auth::routes();

Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wishlist-count', [WishlistController::class, 'wishlistcount']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);

Route::get ('add-to-wishlist',[WishlistController::class,'add']);
Route::post('delete-wishlist-item',[WishlistController::class,'deleteitem']);

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);

    Route::get('my-orders',[UserController::class,'index']);
    Route::get('view-order',[UserController::class,'view']);

   Route::get('wishlist',[WishlistController::class,'index']);
   

   //Ruta para metodo de pago distinto de PayPal (no se utiliza)
   Route::post('proceed-to-pay',[CheckoutController::class,'razorpaycheck']);
});


Route::middleware(['auth' => 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');

    Route::get('/categories', 'Admin\CategoryController@index');

    Route::get('/add-category', 'Admin\CategoryController@add');

    Route::post('insert-category', 'Admin\CategoryController@insert');
    
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);

    Route::put('update-category/{id}', [CategoryController::class,'update']);

    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);

    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);


    Route::get('orders','Admin\OrderController@index');

    
    Route::get('admin/view-order/{id}','Admin\OrderController@view');
    Route::put('update-order/{id}','Admin\OrderController@updateorder');

    Route::get('order-history','Admin\OrderController@orderHistory');

    Route::get('users',[DashboardController::class, 'users']);
    Route::get('view-user/{id}',[DashboardController::class, 'viewuser']);
    
});