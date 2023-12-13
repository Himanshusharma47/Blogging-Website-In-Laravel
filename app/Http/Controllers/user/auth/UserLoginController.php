<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserLoginController extends Controller
{
    
    

    /**
     * Handle the login request and authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginData(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Retrieve user from the database based on the provided username
        $credentials = $request->only('name', 'password');
        $user = User::where('name', $credentials['name'])->first();

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('/home')->with(['success' => 'Login Successful']);
        }

        // Authentication failed
        return redirect("/")->with('error', 'Oops! You have entered invalid credentials');
    }


    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

}
