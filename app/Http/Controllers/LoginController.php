<?php

namespace App\Http\Controllers;

use App\Mail\LoginOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

     public function showotppage()
    {
        return view('otp');
    }

     public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'OTP sent to email'
            ]);
        }

       return response()->json([
            'success' => false,
            'message' => 'Invalid email or password'
        ]);
    }

    public function login_otp(Request $request)
    {



        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $otp = rand(100000, 999999); // email otp

            session([
                'login_otp' => $otp,
                'login_email' => $request->email
            ]);

            Mail::to($request->email)->send(new LoginOtpMail($otp));

            return response()->json([
                'success' => true,
                'message' => 'OTP sent to email'
            ]);
        }

       return response()->json([
            'success' => false,
            'message' => 'Invalid email or password'
        ]);
    }

    public function verifyOtp(Request $request)
    {
        if ($request->otp == session('login_otp')) {

            echo  response()->json([
                'success' => true,
                'message' => 'Login successful'
            ]);
        }

        echo  response()->json([
            'success' => false,
            'message' => 'Invalid OTP'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')
            ->with('success', 'Logged out successfully!');
    }
}
