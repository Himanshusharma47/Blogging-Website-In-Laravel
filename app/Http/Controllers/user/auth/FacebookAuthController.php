<?php

namespace App\Http\Controllers\user\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacebookAuthController extends Controller
{
      /**
    * Redirect the user to the facebook authentication page.
    *
    * @return \Illuminate\Http\RedirectResponse
    */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


     /**
    * Obtain the user information from facebook.
    *
    * @return \Illuminate\Http\RedirectResponse
    */
    public function handleFacebookCallback()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/home');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => bcrypt('Test123')
                ]);

                Auth::login($newUser);

                return redirect()->intended('/home');
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
