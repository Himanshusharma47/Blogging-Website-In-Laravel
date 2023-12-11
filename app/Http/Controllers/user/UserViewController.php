<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserViewController extends Controller
{
    public function loginForm()
    {
        return view('user.login');
    }

    public function registerForm()
    {
        return view('user.register');
    }

    public function homePage()
    {
        return view('user.index');
    }

    public function blogPage()
    {
        return view('user.blog');
    }

    public function blogPopupPage()
    {
        return view('user.blogPopup');
    }

    public function categoryPage()
    {
        return view('user.categoryShow');
    }

    public function postPage()
    {
        $categories = Category::all();

        $user = Auth::guard('web')->user();
        $userId = $user->id;
        
        return view('user.postInsert', compact('categories','userId'));
    }

    public function contactPage()
    {
        return view('user.contact');
    }
}
