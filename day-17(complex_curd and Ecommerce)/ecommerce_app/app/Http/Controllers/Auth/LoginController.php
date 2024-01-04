<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        if ($user->role_as == '1') {
            // Admin Login
            return redirect('dashboard')->with('status', 'Welcome to your dashboard');
        } elseif ($user->role_as == '0') {
            // Normal or Default User Login
            if ($user->is_verified == 1) {
                // Redirect to / if user is verified
                return redirect('/')->with('status', 'Logged in successfully');
            } else {
                // Redirect to otp_verify page if user is not verified
                $this->sendOtp($user);
                return redirect("/otp_verify/" . $user->id);
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function sendOtp($user)
    {
        $otp = rand(100000, 999999);
        $time = time();

        EmailVerification::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'otp' => $otp,
                'created_at' => $time
            ]
        );

        $data['email'] = $user->email;
        $data['title'] = 'Mail Verification';

        $data['body'] = 'Your OTP is:- ' . $otp;

        Mail::send('mailVerification',
            ['data' => $data],
            function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            }
        );
    }
    public function verification($id)
    {
        // dd("Helloi Js");
        $user = User::where('id', $id)->first();
        if (!$user || $user->is_verified == 1) {
            return redirect('/');
        }
        $email = $user->email;

        $this->sendOtp($user); //OTP SEND

        return view('otp_verify', compact('email'));
    }
    public function verifiedOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $otpData = EmailVerification::where('otp', $request->otp)->first();
        if (!$otpData) {
            return response()->json(['success' => false, 'msg' => 'You entered wrong OTP']);
        } else {

            $currentTime = time();
            $time = $otpData->created_at;

            if ($currentTime >= $time && $time >= $currentTime - (90 + 5)) { //90 seconds
                User::where('id', $user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true, 'msg' => 'Mail has been verified']);
            } else {
                return response()->json(['success' => false, 'msg' => 'Your OTP has been Expired']);
            }
        }
    }

    public function resendOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $otpData = EmailVerification::where('email', $request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if ($currentTime >= $time && $time >= $currentTime - (90 + 5)) { //90 seconds
            return response()->json(['success' => false, 'msg' => 'Please try after some time']);
        } else {

            $this->sendOtp($user); //OTP SEND
            return response()->json(['success' => true, 'msg' => 'OTP has been sent']);
        }
    }
}
