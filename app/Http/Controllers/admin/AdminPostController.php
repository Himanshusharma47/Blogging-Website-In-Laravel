<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Delete a post from the application.
     *
     * @param  int|string $id The ID of the post to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postDataDelete($id = '')
    {
        try {
            $data = Post::find($id);

            if ($data) {
                $data->delete();
                return redirect('admin-post')->with(['success' => 'Data Deleted Successfully']);
            } else {
                return redirect()->back()->with(['error' => 'Post not found']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while deleting the post data. Please try again.']);
        }
    }


    /**
     * Search for posts based on the provided criteria.
     *
     * @param  Request $request The HTTP request instance.
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function postSearch(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $title = $request->get('title');
                $posts = Post::where('title', 'LIKE', '%' . $title . '%')->paginate(5);
                return view('admin.post', compact('posts'));
            } else {
                throw new \Exception('Invalid request method.');
            }
        } catch (\Exception $e) {
            return view('admin.post')->with('error', 'An error occurred while searching for post data. Please try again.');
        }
    }


}
