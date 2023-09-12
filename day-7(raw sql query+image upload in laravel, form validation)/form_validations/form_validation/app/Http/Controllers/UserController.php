<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $req){
        // die('Helo');
        $req->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            // 'user_age' => 'required|numeric|max:50', maximum age 50 honi chaheya us sa bre nhi
            // 'user_age' => 'required|numeric|min:18', minijmum age 18 honi chaheya us sa choti nhi
            'user_age' => 'required|numeric|between:18,20',// is ka bech man age honi cheya na choti na bre
            'user_password' => 'required|alpha_num |min:6',
            'user_city' => 'required',
        ]);
        return $req->all();
    }
}
