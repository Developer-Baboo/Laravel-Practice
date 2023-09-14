<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Contact,
    Contactinformation
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
        
        Contactinformation::create([
            'contact_id'=>1,
            'pincode'=>'44333',
            'near_by'=>'xyz place',
            'extra_detail'=>'more information about address'
        ]);
    }
}
