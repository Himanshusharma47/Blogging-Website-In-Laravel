<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Handle the creation of a new post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postData(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required',
                'post' => 'required',
            ]);

            $imageName = time().'.'.$request->image->getClientOriginalName();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = 'images/'.$imageName;

            $table = new Post;
            $table->title = $request->get('title');
            $table->post = $request->get('post');
            $table->user_id = $request->get('userid');
            $table->category_id = $request->get('category');
            $table->image = $imagePath;
            $table->save();

            return back()
                    ->with('success','You have successfully uploaded a post.')
                    ->with('image', $imageName);

        } catch (\Exception $e) {
            return back()
                    ->with('error', 'Error uploading post: ' . $e->getMessage());
        }
    }


    /**
     * Handle the deletion of a single post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function singlePostDelete($id)
    {
        try {
            $post = Post::find($id);

            if (!$post) {
                return back()->with('error', 'Post not found.');
            }

            $post->delete();

            return back()->with('success', 'You have successfully deleted a post.');

        } catch (\Exception $e) {

            return back()->with('error', 'An error occurred while deleting the post.');
        }
    }




}
