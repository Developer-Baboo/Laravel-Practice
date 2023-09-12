<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents(){
        $students = DB::table('students')
        ->join('cities', 'students.city', '=', 'cities.cid')

        ->select('students.*', 'cities.city_name') // Include 'cities.city_name'
        ->where('students.email','=','baboo@gmail.com')
        ->count();
        // ->get();

        return $students;
        // return view('welcome', compact('students'));
    }
}
