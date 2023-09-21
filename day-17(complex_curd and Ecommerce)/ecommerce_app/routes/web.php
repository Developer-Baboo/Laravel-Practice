<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index'); //opening dashboard page
    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index'); //opening category page


    Route::get('add-categories', 'App\Http\Controllers\Admin\CategoryController@add'); //it just open add category Page
    Route::post('insert-category', 'App\Http\Controllers\Admin\CategoryController@insert'); //it actually add category


    Route::get('edit/pro/{id}', 'App\Http\Controllers\Admin\CategoryController@edit'); //it just opening edit category page
    Route::put('update-category/{id}', 'App\Http\Controllers\Admin\CategoryController@update'); //it just actually editing category data


    Route::delete('delete-category/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy')->name('category.destroy'); //it just actually destroying category





});
