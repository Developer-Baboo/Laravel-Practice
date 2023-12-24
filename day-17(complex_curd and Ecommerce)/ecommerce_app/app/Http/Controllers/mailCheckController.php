<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class mailCheckController extends Controller
{
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');

        // Check if the email exists in the database
        $exists = User::where('email', $email)->exists();

        return response()->json(['exists' => $exists]);
    }
}
