<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleEmailVerifyController extends Controller
{ public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();

            $newUser = User::create([

                        'name' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id
            
                    ]);
            
                    Auth::login($newUser);
            
                    return redirect()->back();

        } catch (\Exception $e) {

            return redirect('auth/google')->with('error', 'Your Have Error Is' . $e->getMessage());

        }

    }

    // public function handleGoogleCallback(){
    //     $user = Socialite::driver('google')->user();

    // if($finduser) {

    //     Auth::login($finduser);

    //     return redirect('/home');
    // }
  
}
