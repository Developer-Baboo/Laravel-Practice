<?php

namespace App\Http\Controllers;

// use Auth;
// use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
   public function index(){
    return view('auth.login');
   }

   public function login(Request $request){
    // dd($request->all());
    $credentials = $request->validate([
        'email'=>'required',
        'password' => 'required',
    ]);
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect('home');
    }
    return redirect('login')->withErrors('Incorrect Email or Password');


   }
   public function register_view(){
     return view('auth.register');
   }

    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required |confirmed',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email, 
            'password'=>$request->password, 
        ]);

        //login user here

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('home');
        }
        return redirect('register')->withErrors('Error');
    }
    
   public function home()
    {
        return view('home');
    }

    public function logout()
    {
       Session::flush();
       Auth::logout();
        return redirect('/');
    }
}
