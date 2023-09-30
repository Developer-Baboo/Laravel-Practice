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
use App\Http\Controllers\Frontend\FrontendController as FrontendFrontendController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\WishListController;
// use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\ReviewController1;

Route::get('/', 'App\Http\Controllers\frontend\FrontendController@index');

Route::get('category', 'App\Http\Controllers\frontend\FrontendController@category');

Route::get('view_category/{slug}', 'App\Http\Controllers\frontend\FrontendController@view_category')->name('view.category');

Route::get('category/{cate_slug}/{prod_slug}', 'App\Http\Controllers\frontend\FrontendController@productview');

//Search functionality

Route::get('product-list', 'App\Http\Controllers\frontend\FrontendController@productlistAjax');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Count product exist in cart and how on navbar
Route::get('load-cart-data', [CartController::class, 'cartcount']);

//Load Wishlist count
Route::get('load-wishlist-count', [WishListController::class, 'wishlistcount']);

//Add to cart
Route::post('/add-to-cart', [CartController::class, 'addProduct']);

// delete product item from cart
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);

//update cart (chagne total price on increment/decreemnt quantity)
Route::post('update_cart', [CartController::class, 'update_cart']);

//Add to wish list
Route::post('add-to-wishlist', [WishListController::class, 'add']);

//remove from wish list
Route::post('delete-wishlist-item', [WishListController::class, 'deleteitem']);



//Only authenticated use can view cart
Route::middleware(['auth'])->group(function () {

    //user can  view cart
    Route::get('cart', [CartController::class, 'viewcart']);

    //View Checkout page
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');

    //Place Order Page
    Route::post('place_order', [CheckoutController::class, 'place_order'])->name('place_order');

    // getting order which i have did from db
    Route::get('my_orders', [UserController::class, 'index'])->name('my_orders');

    // view order details
    Route::get('view_order_details/{id}', [UserController::class, 'view'])->name('view_order_details');

    // add-rating
    Route::post('/add-rating', [RatingController::class, 'add_rating']);

    //Add Review just open page
    Route::get('add_review/{product_slug}/userreview', [ReviewController1::class, 'add']);

    // actually add review
    Route::post('add_review', [ReviewController1::class, 'create']);

    //edit review
    Route::get('edit_review/{product_slug}/userreview', [ReviewController1::class, 'edit']);

    //update
    Route::PUT('update_review', [ReviewController1::class, 'update']);


    //get wish list item
    Route::get('wishlist', [WishListController::class, 'index']);

    //Used for payment
    Route::post('proceed-to-pay', [CheckoutController::class, 'razorpaycheck']);
});

/*
If a user is not authenticated, they won't be able to access any of the routes within this group.
If a user is authenticated but doesn't have the "isAdmin" role or permission, they also won't be able to access the routes within this group.
Only authenticated users with the "isAdmin" role or permission will be able to access the routes inside this group.
*/
Route::middleware(['auth', 'isAdmin'])->group(function () {
    //opening dashboard page
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index');

    //opening category page
    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index');

    //it just open add category Page
    Route::get('add-categories', 'App\Http\Controllers\Admin\CategoryController@add');

    //it actually add category
    Route::post('insert-category', 'App\Http\Controllers\Admin\CategoryController@insert');

    //it just opening edit category page
    Route::get('edit-category/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');

    //it just actually editing category data
    Route::put('update-category/{id}', 'App\Http\Controllers\Admin\CategoryController@update');

    // Deleting Category
    Route::delete('delete-category/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy')->name('category.destroy');

    //Fetching all products details
    Route::get('products', 'App\Http\Controllers\Admin\ProductController@index');

    //Adding Products
    Route::get('add-products', 'App\Http\Controllers\Admin\ProductController@add');

    //inserting products
    Route::post('insert-product', 'App\Http\Controllers\Admin\ProductController@insert');

    //Editing Products
    Route::get('edit-product/{id}', 'App\Http\Controllers\Admin\ProductController@edit');

    //Update Products
    Route::put('update-product/{id}', 'App\Http\Controllers\Admin\ProductController@update');

    //deleting prodducts
    Route::delete('delete-product/{id}', 'App\Http\Controllers\Admin\ProductController@destroy')->name('product.destroy');

    //fetch order form db on admin panel
    Route::get('orders', 'App\Http\Controllers\Admin\OrderController@index')->name('orders');

    //view single order details
    Route::get('admin/view_order/{id}', 'App\Http\Controllers\Admin\OrderController@view')->name('admin.view_order');

    //Update order status like pending to completed

    Route::PUT('update_order/{id}', 'App\Http\Controllers\Admin\OrderController@update');

    //Get Order History
    Route::get('order_history', 'App\Http\Controllers\Admin\OrderController@order_history');

    //Show all Registered Users on Admin Dashboard
    Route::get('users', [DashboardController::class, 'users']);

    // Admin can view individual registered user details
    Route::get('view_user/{id}', [DashboardController::class, 'view_user']);
});
