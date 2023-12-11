<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function commentDataDelete($id='')
    {
        $data = Comment::find($id);
        $data->delete();
        if($data) {
            return redirect('admin-comment')->with(['success' => 'Data Deleted Successfully']);
        }
        return redirect()->back()->with(['error' => 'Error To Delete The Data']);
    }

}
