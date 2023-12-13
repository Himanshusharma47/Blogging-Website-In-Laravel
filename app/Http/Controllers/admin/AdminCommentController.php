<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    /**
     * Controller method to delete a comment from the application.
     *
     * @param  int|string $id The ID of the comment to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function commentDataDelete($id = '')
    {
        try {
            $data = Comment::find($id);

            if ($data) {
                $data->delete();
                return redirect('admin-comment')->with(['success' => 'Data Deleted Successfully']);
            } else {
                return redirect()->back()->with(['error' => 'Comment not found']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while deleting the comment. Please try again.']);
        }
    }


}
