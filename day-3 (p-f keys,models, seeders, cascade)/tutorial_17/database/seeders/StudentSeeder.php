<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* $students= collect(
            [
                [
                "name"=>"Baboo",
                "email"=>"baboo@gmil.com",
                ],
                [
                "name"=>"Akash",
                "email"=>"akash@gmil.com",
                ],
                [
                "name"=>"Munesh",
                "email"=>"munesh@gmil.com",
                ],
        ]); */


        $json = File::get(path:'database/json/student.json');

        $students=collect(json_decode($json));

        $students->each(function ($student){
            student::create([
            "name" => student->name,
            "email" => student->email,
            ]);
        });

        // student::create([
        //     "name"=>"Dolat",
        //     "email"=>"dolat@gmil.com",
        //     ]);
    }
}
