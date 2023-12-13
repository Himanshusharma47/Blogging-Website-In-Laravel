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
        $blogData = Post::inRandomOrder()->limit(4)->get();
        return view('user.index', compact('blogData'));
    }

    public function blogPage()
    {
        $blogData = Post::paginate(12);
        $categoryData = Category::all();
        return view('user.blog', compact(['categoryData', 'blogData']));
    }

    // public function blogPopupPage()
    // {
    //     return view('user.blogPopup');
    // }


    public function singleCategoryShow(Request $request, $id='')
    {

        $blogData = Post::where('category_id', $id)->get();
        return view('user.categoryShow', compact( 'blogData'));
    }


    public function postIdDataShow($id)
    {
        $singlePost = Post::where('id', $id)->get();
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

    public function profilePage()
    {


        $userid = auth()->guard('web')->id();
        $post = Post::where('user_id', $userid)->get();
        // dd($share);

        return view('user.profile', compact('post'));
    }
}
