<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('students', [StudentController::class, 'index']); //fetch record
Route::post('students', [StudentController::class, 'store']); //add
Route::get('students/{id}',[StudentController::class, 'show']); //fetch single recrod
Route::get('students/{id}/edit',[StudentController::class, 'edit']); //fetch single record, copy record, open new tab, past into json, update then send request, url should of below
Route::put('students/{id}/edit',[StudentController::class, 'update']); // update record
Route::delete('students/{id}/delete',[StudentController::class, 'destroy']); //delete record
