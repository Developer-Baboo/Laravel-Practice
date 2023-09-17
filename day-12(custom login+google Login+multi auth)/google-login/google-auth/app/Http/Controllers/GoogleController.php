<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    // This method redirects the user to Google for authentication.
    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // This method handles the callback from Google after authentication.
    public function callbackFromGoogle()
    {
        try
        {
            // Retrieve user information from Google.
            $user = Socialite::driver('google')->user();

            // Check if a user with the same email already exists in your database.
            $is_user = User::where('email', $user->getEmail())->first();

            if (!$is_user)
            {
                // If the user doesn't exist, create a new user or update the existing one.
                $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId(),
                    ],
                    [
                        'name' => $user->getName(),
                        'email' => $user->getEmail(),
                        'password' => Hash::make($user->getName().'@'.$user->getId()), // Generating a password based on user data (this may not be secure).
                    ]
                );
            }
            else
            {
                // If the user already exists, update the 'google_id' in their record.
                $saveUser = User::where('email', $user->getEmail())->update([
                    'google_id' => $user->getId(),
                ]);

                // Retrieve the updated user record.
                $saveUser = User::where('email', $user->getEmail())->first();
            }

            // Log in the user using their ID.
            Auth::loginUsingId($saveUser->id);

            // Redirect the authenticated user to the 'home' route.
            return redirect()->route('home');
        }
        catch (\Throwable $th)
        {
            throw $th; // Handle any exceptions that occur during this process.
        }
    }
}
