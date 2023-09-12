<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', 'App\Http\Controllers\UserController@showUsers')->name('users');
Route::get('/users/{id}', 'App\Http\Controllers\UserController@singleUsers')->name('view.user');
Route::post('/add', 'App\Http\Controllers\UserController@addUsers')->name('addUser');
Route::get('/updatepage/{id}','App\Http\Controllers\UserController@updatePage')->name('update.page');
Route::post('/update/{id}', 'App\Http\Controllers\UserController@updateUser')->name('update.user');
Route::get('/delete/{id}', 'App\Http\Controllers\UserController@deleteUser')->name('delete.user');

Route::view('newuser','/adduser');
