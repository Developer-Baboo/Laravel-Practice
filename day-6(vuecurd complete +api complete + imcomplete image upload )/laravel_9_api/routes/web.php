<?php
use App\Http\Controllers\Api\StudentController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

