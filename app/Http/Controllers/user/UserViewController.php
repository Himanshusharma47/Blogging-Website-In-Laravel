<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
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
        $blogData = Post::all();
        $categoryData = Category::all();
        return view('user.blog', compact(['categoryData', 'blogData']));
    }

    // public function blogPopupPage()
    // {
    //     return view('user.blogPopup');
    // }

    public function singleCategoryShow($id='')
    {
        $singleCataegory = Post::find($id)->all();
        return view('user.categoryShow', compact('singleCategory'));
    }

    public function postIdDataShow($id='')
    {
        $singlePost = Post::find($id);
        return view('user.blogPopup', compact('singlePost'));
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

    public function aboutPage()
    {
        return view('user.about');
    }
}
