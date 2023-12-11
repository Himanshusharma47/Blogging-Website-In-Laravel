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
        public function loginForm()
        {
            return view('admin.login');
        }

        public function adminPostView()
        {
            $posts = Post::paginate(15);
            return view('admin.post', compact('posts'));
        }

        public function adminCommentView()
        {
            $comments = Comment::paginate(5);
            return view('admin.comment', compact('comments'));
        }

        public function adminAddCategory()
        {
            return view('admin.addCategory');
        }

        public function adminCategoryView()
        {
            $categories = Category::paginate(5);
            return view('admin.category', compact('categories'));
        }

        public function adminUserView()
        {
            $data = User::paginate(5);
            return view('admin.manageUser', compact('data'));
        }

        public function adminPassword()
        {
            return view('admin.changePassword');
        }

        public function dashboard()
        {
            $totaluser = User::count();
            $totalpost = Post::count();
            return view('admin.dashboard', compact(['totaluser','totalpost']));
        }
}
