<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailVerify;

class UserRegisterController extends Controller
{

    /**
     * Handle the registerdata request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerData(Request $request)
    {

         $existingUser = User::where('email', $request->email)->first();

         if ($existingUser) {

             return redirect('/')->with('error', 'An account with this email already exists. Please proceed to login.');
         }

         $otp = rand(1000,9999);

         $otpExpiresAt = now()->addMinutes(2);

            $user = User::create ([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
             'otp' => $otp,
             'otp_expires_at' => $otpExpiresAt,
         ]);

         // Send the numeric OTP to the user's email
         Mail::to($user->email)->send(new MailVerify($otp));

         return redirect()->route('otp.verify', ['user' => $user]);
    }
}
