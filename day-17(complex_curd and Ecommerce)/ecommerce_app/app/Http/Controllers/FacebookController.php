<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;
class FacebookController extends Controller
{
    // This method redirects the user to Google for authentication.
    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookredirect(){
    try{
        $user = Socialite::driver('facebook')->user();
        $finduser = User::where('facebook_id', $user->id)->first();

        if($finduser){
            Auth::login($finduser);
            return redirect()->indended('dashboard');
        }
        else{
            $newUser = User::updateOrCreate(['email'=> $user->email],[
                'name' => $user->name,
                'id' => $user->id,
                'password' => encrypt('12345dummy')
            ]);
            Auth::login($newUser);

            return redirect()->intended('dashboard');
        }
    }catch(Exception $e){
        dd($e->getMessage());
    }

}
}
