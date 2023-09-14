<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Contact
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' =>bcrypt('password')
        ]);
        Contact::create([
            'user_id' => 1,
            'phone_no' => '03422449445',
            'address' =>'Address test'
        ]);
    }
}
