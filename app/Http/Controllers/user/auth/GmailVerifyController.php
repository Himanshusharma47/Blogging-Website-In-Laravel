<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use App\Mail\MailVerify;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class GmailVerifyController extends Controller
{
    /**
     * Display the OTP verification form for the user.
     *
     * @param  User $user The user instance.
     * @return \Illuminate\Contracts\View\View
     */
    public function show(User $user)
    {
        return view('user.otp', compact('user'));
    }


    /**
     * Verify the OTP provided by the user.
     *
     * @param  Request $request The HTTP request instance.
     * @param  User    $user    The user instance.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request, User $user)
    {
        $this->validate($request, [
            'otp' => 'required|size:4',
        ]);

        if ($user->otp === $request->otp && $user->otp_expires_at > now()) {
            $user->email_verified_at = now();
            $user->otp = null; // Clear the OTP after successful verification
            $user->otp_expires_at = null; // Clear the OTP expiration time
            $user->save();

            Auth::login($user);
            return redirect('/home')->with('success', 'You have Successfully Signed Up');
        } elseif ($user->email_verified_at) {
            return redirect('/')->with('error', 'Your email is already verified. Please proceed to login.');
        } else {
            return back()->with('error', 'Invalid or expired OTP. Please try again.');
        }
    }


    /**
     * Resend OTP to the user's email for verification.
     *
     * @param  Request $request The HTTP request instance.
     * @param  User    $user    The user instance.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resendOtp(Request $request, User $user)
    {
        if (!$user->email_verified_at) {
            // Generate a new OTP and set the expiration time (e.g., 2 minutes from now)
            $otp = rand(1000, 9999);
            $otpExpiresAt = now()->addMinutes(1);

            // Update the user's OTP and OTP expiration time
            $user->otp = $otp;
            $user->otp_expires_at = $otpExpiresAt;
            $user->save();

            // Send the new OTP to the user's email
            // Implement your email sending logic here (similar to the registration process)
            Mail::to($user->email)->send(new MailVerify($otp));
            return redirect()->back()->with('success', 'A new OTP has been sent to your email.');
        } else {
            return redirect('user/login-form')->with('error', 'Your email is already verified. Please proceed to login.');
        }
    }

}
