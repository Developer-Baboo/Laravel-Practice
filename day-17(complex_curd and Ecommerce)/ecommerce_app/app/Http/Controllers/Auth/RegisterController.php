<?php
namespace App\Http\Controllers\Auth; 
 use App\Http\Controllers\Controller;
 use App\Providers\RouteServiceProvider;
 use App\Models\User;
 use Illuminate\Foundation\Auth\RegistersUsers;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Validator;
 use Illuminate\Http\Request;
 use App\Events\UserRegistered;
 
 class RegisterController extends Controller
 {
     use RegistersUsers;
 
     // ...
 
     /**
      * Get the post register / login redirect path.
      *
      * @param \Illuminate\Http\Request $request
      * @return string
      */
     protected function redirectTo(Request $request)
     {
         return '/otp_verify';
     }

     protected function redirectToo(Request $request)
     {
         return '/otp_verify';
     }

 
     // ...
 
     /**
      * The user has been registered.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  mixed  $user
      * @return mixed
      */
     protected function registered(Request $request, $user)
     {
         // Dispatch the UserRegistered event
         event(new UserRegistered($user));
     }
 }
 

?>