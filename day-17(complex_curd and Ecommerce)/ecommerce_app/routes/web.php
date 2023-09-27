<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishListController;

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

Route::get('/','App\Http\Controllers\frontend\FrontendController@index');
Route::get('category','App\Http\Controllers\frontend\FrontendController@category');

Route::get('view_category/{slug}','App\Http\Controllers\frontend\FrontendController@view_category')->name('view.category');
Route::get('category/{cate_slug}/{prod_slug}','App\Http\Controllers\frontend\FrontendController@productview');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add-to-cart', [CartController::class, 'addProduct']);
// delete product item from cart
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
//update cart (chagne total price on increment/decreemnt quantity)
Route::post('update_cart', [CartController::class, 'update_cart']);

//Add to wish list

Route::post('add-to-wishlist', [WishListController::class, 'add'] );


//Only authenticated use can view cart
Route::middleware(['auth'])->group(function (){
    Route::get('cart', [CartController::class, 'viewcart'] );
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('place_order', [CheckoutController::class, 'place_order'])->name('place_order');
    // getting order which i have did from db
    Route::get('my_orders', [UserController::class, 'index'])->name('my_orders');
    // view order details
    Route::get('view_order_details/{id}', [UserController::class, 'view'])->name('view_order_details');

    Route::get('wishlist', [WishListController::class, 'index']);


});

/*
If a user is not authenticated, they won't be able to access any of the routes within this group.
If a user is authenticated but doesn't have the "isAdmin" role or permission, they also won't be able to access the routes within this group.
Only authenticated users with the "isAdmin" role or permission will be able to access the routes inside this group.
*/
Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index'); //opening dashboard page
    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index'); //opening category page
    Route::get('add-categories', 'App\Http\Controllers\Admin\CategoryController@add'); //it just open add category Page
    Route::post('insert-category', 'App\Http\Controllers\Admin\CategoryController@insert'); //it actually add category
    Route::get('edit-category/{id}', 'App\Http\Controllers\Admin\CategoryController@edit'); //it just opening edit category page
    Route::put('update-category/{id}', 'App\Http\Controllers\Admin\CategoryController@update'); //it just actually editing category data
    Route::delete('delete-category/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy')->name('category.destroy'); //it just actually destroying category
   //Products Routes
    Route::get('products', 'App\Http\Controllers\Admin\ProductController@index'); //it just dispalying projduct
    Route::get('add-products', 'App\Http\Controllers\Admin\ProductController@add'); //it just open add product Page
    Route::post('insert-product', 'App\Http\Controllers\Admin\ProductController@insert'); //actually adding products
    //editing
    Route::get('edit-product/{id}', 'App\Http\Controllers\Admin\ProductController@edit'); //it just opening edit product page
    Route::put('update-product/{id}', 'App\Http\Controllers\Admin\ProductController@update'); //it is actully updating products
    //deleting
    Route::delete('delete-product/{id}', 'App\Http\Controllers\Admin\ProductController@destroy')->name('product.destroy'); //it just


    //fetch order form db on admin panel
    Route::get('orders', 'App\Http\Controllers\Admin\OrderController@index')->name('orders');

    //view single order details
    Route::get('admin/view_order/{id}', 'App\Http\Controllers\Admin\OrderController@view')->name('admin.view_order');

    //Update order status like pending to completed

    Route::PUT('update_order/{id}', 'App\Http\Controllers\Admin\OrderController@update');

    //Get Order History
    Route::get('order_history', 'App\Http\Controllers\Admin\OrderController@order_history');

    //Show Registered Users on Admin Dashboard
    Route::get('users', [DashboardController::class, 'users']);

    //Get single users details

    // view_user
    Route::get('view_user/{id}', [DashboardController::class, 'view_user']);


});
