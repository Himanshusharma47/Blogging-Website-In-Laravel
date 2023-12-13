<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Insert new category data into the application.
     *
     * @param  Request $request The HTTP request instance.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function categoryDataInsert(Request $request)
    {
        try {
            $data = new Category;

            if ($request->isMethod('post')) {
                $data->category = $request->get('category');
                $data->description = $request->get('description');
                $data->save();
            }

            if ($data) {
                return redirect('admin-category')->with(['success' => 'Data Added Successfully']);
            } else {
                throw new \Exception('Failed to add category data.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while adding the category data. Please try again.']);
        }
    }


    /**
     * Delete a category from the application.
     *
     * @param  int|string $id The ID of the category to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function categoryDataDelete($id = '')
    {
        try {
            $data = Category::find($id);

            if ($data) {
                $data->delete();
                return redirect('admin-category')->with(['success' => 'Data Deleted Successfully']);
            } else {
                return redirect()->back()->with(['error' => 'Category not found']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'An error occurred while deleting the category data. Please try again.']);
        }
    }


    /**
     * Search for categories based on the provided criteria.
     *
     * @param  Request $request The HTTP request instance.
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function categorySearch(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $category = $request->get('category');
                $categories = Category::where('category', 'LIKE', '%' . $category . '%')->paginate(5);
                return view('admin.category', compact('categories'));
            } else {
                throw new \Exception('Invalid request method.');
            }
        } catch (\Exception $e) {
            return view('admin.category')->with('error', 'An error occurred while searching for category data. Please try again.');
        }
    }

}
