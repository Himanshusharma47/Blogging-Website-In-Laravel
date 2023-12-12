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
    public function registerData(Request $request){
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:users|email',
        //     'password' => 'required',
        // ]);

        // $data = new User;
        // $data->name = $request->get('name');
        // $data->email = $request->get('email');
        // $data->password = Hash::make($request->get('password'));
        // $data->save();

        // if($data) {
        //     return redirect()->back()->with('success', 'Successfully Registered Now You Can Login');
        // }else {
        //     return redirect()->back()->with('error', 'Failed To Registered ');
        // }

         // Check if a user with the same email already exists
         $existingUser = User::where('email', $request->email)->first();

         if ($existingUser) {
             // User with the same email already exists, redirect to login page
             return redirect('/')->with('error', 'An account with this email already exists. Please proceed to login.');
         }
 
         // Generate a random numeric OTP with 6 digits
         $otp = rand(1000,9999);
 
         // Set the expiration time (e.g., 15 minutes from now)
         $otpExpiresAt = now()->addMinutes(2);
 
         // Create a new user and store the numeric OTP and its expiration time in the database
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password),
             'otp' => $otp, // Store the numeric OTP
             'otp_expires_at' => $otpExpiresAt, // Store the expiration time
         ]);
 
         // Send the numeric OTP to the user's email
         Mail::to($user->email)->send(new MailVerify($otp));
 
         return redirect()->route('otp.verify', ['user' => $user]);
    }
}
