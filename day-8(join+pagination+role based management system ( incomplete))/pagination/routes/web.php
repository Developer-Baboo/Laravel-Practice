<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'App\Http\Controllers\UserController@showusers');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@singleusers')->name('view.user');
