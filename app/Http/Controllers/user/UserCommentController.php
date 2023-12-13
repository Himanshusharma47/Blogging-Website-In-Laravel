<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class UserCommentController extends Controller
{

     /**
     * Handle the creation of a new post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function commentStore(Request $request)
    {
        try {
            $request->validate([
                'comment' => 'required|string',
            ]);

            // 'user_id' => auth()->id(), // Assuming you have authentication

            $comment = new Comment;
                $comment->post_id = $request->post_id;
                $comment->user_id = $request->user_id;
                $comment->comment = $request->comment;
                $comment->save();

                if($comment) {

                    return  back()->with('success', 'Comment submitted successfully!');

                } else {

                    return  back()->with('error', 'Comment submitted unsuccessfully!');

                }
        } catch (\Exception $e) {
            return back()
                    ->with('error', 'Error to submit comment ' . $e->getMessage());
        }
    }
}
