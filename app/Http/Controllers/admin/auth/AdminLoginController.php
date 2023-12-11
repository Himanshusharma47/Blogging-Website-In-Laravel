<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use App\Models\AdminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
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
            'adminname' => 'required',
            'password' => 'required',
        ]);

        // Retrieve user from the database based on the provided username
        $credentials = $request->only('adminname', 'password');
        $user = AdminLogin::where('adminname', $credentials['adminname'])->first();

        if (Auth::guard('adminlogin')->attempt($credentials)) {
            return redirect('/admin-dashboard')->with(['success' => 'Login Successful']);
        }

        // Authentication failed
        return redirect("/admin-login")->with('error', 'Oops! You have entered invalid credentials');
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

        return redirect('/admin-login');
    }


     /**
     * Handle the password change request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        if ($request->isMethod('post')) {

            $oldpw = $request->get('oldPassword');
            $newpw = $request->get('newPassword');
            $cnewp = $request->get('confNewPassword');

            if ($newpw == $cnewp) {

                $data = AdminLogin::where('password', $oldpw)->first();

                if (isset($data)) {
                    $data->password = $newpw;
                    $data->save();
                    return redirect()->back()->with("success", "Password Updated Successfully");
                } else {
                    return redirect()->back()->with("error", "Old Password not match");
                }
            } else {
                return redirect()->back()->with("error", "New password and Confirm new password does not match");
            }
        }
    }
}
