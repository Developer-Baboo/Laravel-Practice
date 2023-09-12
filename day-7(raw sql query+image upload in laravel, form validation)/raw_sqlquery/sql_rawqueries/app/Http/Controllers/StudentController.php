<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents(){
        // $students = DB::select('select * from students');
        // $students = DB::select('select * from students where id = ?', [1]);
        $students = DB::select("select name, email from students where id = ?", [1]);
        return $students;
        // foreach($students as $student){
        //     echo $student->name."<br/>";
        // }
    }
}
