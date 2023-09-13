<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    dd("test");
    // return view('welcome');
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('login',[AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('register',[AuthController::class,'register_view'])->name('register');
});



Route::group(['middleware'=>'auth'], function(){
    Route::get('home',[AuthController::class,'home'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});



