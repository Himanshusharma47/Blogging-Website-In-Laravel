<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserViewController extends Controller
{
    /**
     * Display the login form.
     *
     * @return \Illuminate\View\View
     */
    public function loginForm()
    {
        return view('user.login');
    }

    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function registerForm()
    {
        return view('user.register');
    }

    /**
     * Display the home page with random blog posts.
     *
     * @return \Illuminate\View\View
     */
    public function homePage()
    {
        $blogData = Post::inRandomOrder()->limit(4)->get();
        return view('user.index', compact('blogData'));
    }

    /**
     * Display the blog page with paginated blog posts and all categories.
     *
     * @return \Illuminate\View\View
     */
    public function blogPage()
    {
        $blogData = Post::paginate(12);
        $categoryData = Category::all();
        return view('user.blog', compact(['categoryData', 'blogData']));
    }

    /**
     * Display blog posts for a specific category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\View\View
     */
    public function singleCategoryShow(Request $request, $id = '')
    {
        $blogData = Post::where('category_id', $id)->get();
        return view('user.categoryShow', compact('blogData'));
    }

    /**
     * Display a single blog post.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function postIdDataShow($id)
    {
        $singlePost = Post::where('id', $id)->get();
        return view('user.blogPopup', compact('singlePost'));
    }

    /**
     * Display the category page.
     *
     * @return \Illuminate\View\View
     */
    public function categoryPage()
    {
        return view('user.categoryShow');
    }

    /**
     * Display the page for creating a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function postPage()
    {
        $categories = Category::all();
        $user = Auth::guard('web')->user();
        $userId = $user->id;
        return view('user.postInsert', compact('categories', 'userId'));
    }

    /**
     * Display the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contactPage()
    {
        return view('user.contact');
    }

    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function aboutPage()
    {
        return view('user.about');
    }

    /**
     * Display the user's profile page with their posts.
     *
     * @return \Illuminate\View\View
     */
    public function profilePage()
    {
        $userid = auth()->guard('web')->id();
        $post = Post::where('user_id', $userid)->get();
        return view('user.profile', compact('post'));
    }

}
