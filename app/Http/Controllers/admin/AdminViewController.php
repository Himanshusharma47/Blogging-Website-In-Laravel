<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{
        /**
     * Display the login form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function loginForm()
    {
        return view('admin.login');
    }

    /**
     * Display the admin post view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminPostView()
    {
        $posts = Post::paginate(15);
        return view('admin.post', compact('posts'));
    }

    /**
     * Display the admin comment view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminCommentView()
    {
        $comments = Comment::paginate(5);
        return view('admin.comment', compact('comments'));
    }

    /**
     * Display the admin add category view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminAddCategory()
    {
        return view('admin.addCategory');
    }

    /**
     * Display the admin category view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminCategoryView()
    {
        $categories = Category::paginate(5);
        return view('admin.category', compact('categories'));
    }

    /**
     * Display the admin user view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminUserView()
    {
        $data = User::paginate(5);
        return view('admin.manageUser', compact('data'));
    }

    /**
     * Display the admin password change view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function adminPassword()
    {
        return view('admin.changePassword');
    }

    /**
     * Display the admin dashboard view with total user and post counts.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $totaluser = User::count();
        $totalpost = Post::count();
        return view('admin.dashboard', compact(['totaluser', 'totalpost']));
    }

}
