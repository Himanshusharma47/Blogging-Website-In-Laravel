<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUserController extends Controller
{
    /**
     * Delete a user from the application.
     *
     * @param  int|string $id The ID of the user to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userDataDelete($id = '')
    {
        try {
            $data = User::find($id);

            if ($data) {
                $data->delete();
                return redirect('admin-user')->with(['success' => 'Data Deleted Successfully']);
            } else {
                return redirect()->back()->with(['error' => 'User not found']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while deleting the user data. Please try again.']);
        }
    }

    /**
     * Search for users based on the provided criteria.
     *
     * @param  Request $request The HTTP request instance.
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function userSearch(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $name = $request->get('name');
                $data = User::where('name', 'LIKE', '%' . $name . '%')->paginate(5);
                return view('admin.manageUser', compact('data'));
            } else {
                throw new \Exception('Invalid request method.');
            }
        } catch (\Exception $e) {
            return view('admin.manageUser')->with('error', 'An error occurred while searching for user data. ');
        }
    }

}
