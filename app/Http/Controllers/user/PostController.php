<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postData(Request $request)
    {

        // dd($request->all());
        // die();

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'post' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Store $imageName in the database if needed
        $table = new Post;
        $table->title = $request->get('title');
        $table->post = $request->get('post');
        $table->user_id = $request->get('userid');
        $table->category_id = $request->get('category');
        $table->image = $imageName;
        $table->save();


        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */

        return back()
                ->with('success','You have successfully upload Post.')
                ->with('image',$imageName);
    }
}
