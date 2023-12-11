<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminManageUserController extends Controller
{
    public function userDataDelete($id='')
    {
        $data = User::find($id);
        $data->delete();
        if($data) {
            return redirect('admin-user')->with(['success' => 'Data Deleted Successfully']);
        }
        return redirect()->back()->with(['error' => 'Error To Delete The Data']);
    }

    public function userSearch(Request $request)
    {
        if($request->isMethod('post')) {
            $name = $request->get('name');
            $data = User::where('name', 'LIKE', '%'. $name . '%')->paginate(5);
            return view('admin.manageUser', compact('data'));
        }
        return view('admin.manageUser')->with('error', 'No data found');
    }
}
