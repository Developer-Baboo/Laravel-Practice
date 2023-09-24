<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\frontend\CartController;

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

//Only authenticated use can view cart
Route::middleware(['auth'])->group(function (){
    Route::get('cart', [CartController::class, 'viewcart'] );
});



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


});
