<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about');
});


Route::get('/post', function () {
    return view('post');
});

Route::get('/test', function () {
    return view('test');
});



//Tutorial 12
Route::get('/users', function () {
    // $name = "Yahoo Baba"
    // return view('users', ['user'=>"Yahoo Baba"]);
    // return view('users', ['user'=>$name]);
    //return view('users, [
        //'user' => $name,
        //'city' => '<script>alert("sdfsd");</script>'
    //]);

    // return view('users')->with('user',$name)->with('city', 'Delhi');
});
