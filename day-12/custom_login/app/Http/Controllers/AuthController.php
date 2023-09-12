<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function index(){
    return view('auth.login');
   }

   public function login(Request $request){
    // dd($request->all());
    $request->validate([
        'email'=>'email',
        'password' => 'email',
    ]);
    //TODO: Login
   }

    public function register(Request $request)
    {
        dd($request->all());
        $request->validate([
            'name' => 'name | required',
            'email' => 'email | required',
            'confirm_password' => 'password|required',            
            'password' => 'email',
        ]);
    }
    
   public function register_view()
    {
        return view('auth.register');
    }
}
