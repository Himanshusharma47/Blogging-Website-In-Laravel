<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function postDataDelete($id='')
    {
        $data = Post::find($id);
        $data->delete();
        if($data) {
            return redirect('admin-post')->with(['success' => 'Data Deleted Successfully']);
        }
        return redirect()->back()->with(['error' => 'Error To Delete The Data']);
    }

    public function postSearch(Request $request)
    {
        if($request->isMethod('post')) {
            $title = $request->get('title');
            $posts = Post::where('title', 'LIKE', '%'. $title . '%')->paginate(5);
            return view('admin.post', compact('posts'));
        }
        return view('admin.post')->with('error', 'No data found');
    }
}
