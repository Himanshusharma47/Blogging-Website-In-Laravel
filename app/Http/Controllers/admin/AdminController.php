<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function categoryDataInsert(Request $request)
    {
        $data = new Category;
        if($request->isMethod('post')) {
            $data->category = $request->get('category');
            $data->description = $request->get('description');
            $data->save();
        }

        if($data) {
            return redirect('admin-category')->with(['success' => 'Data Added Successfully']);
        }
        return redirect()->back()->with(['error' => 'Error To Add The Data']);

    }

    public function categoryDataDelete($id='')
    {
        $data = Category::find($id);
        $data->delete();
        if($data) {
            return redirect('admin-category')->with(['success' => 'Data Deleted Successfully']);
        }
        return redirect()->back()->with(['error' => 'Error To Delete The Data']);
    }


    public function categorySearch(Request $request)
    {
        if($request->isMethod('post')) {
            $category = $request->get('category');
            $categories = Category::where('category', 'LIKE', '%'. $category . '%')->paginate(5);
            return view('admin.category', compact('categories'));
        }
        return view('admin.category')->with('error', 'No data found');
    }
}
