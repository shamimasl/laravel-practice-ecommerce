<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::paginate(2, ['*'], 'subcategories');
        $deleted_sub_categories = Subcategory::onlyTrashed()->paginate(1, ['*'], 'deleted_sub_categories');
        return view('subcategory.index', compact('categories', 'subcategories', 'deleted_sub_categories'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'sub_category_name' => 'required'
        ]);
        if (Subcategory::where('category_id', $request->category_id)->where('sub_category_name', $request->sub_category_name)->exists()) {
            return back()->with('error_status', 'Already Exists');
        } else {
            Subcategory::insert([
                'category_id' => $request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('status', 'Sub Category Added Successfully');
        }
    }

    public function delete($id)
    {
        Subcategory::find($id)->delete();
        return back();
    }
    public function restore($id)
    {
        Subcategory::withTrashed()->find($id)->restore();
        return back();
    }
    public function permanentdelete($id)
    {
        Subcategory::withTrashed()->find($id)->forceDelete();
        return back();
    }
    public function markdelete(Request $request)
    {
        if ($request->mark_delete_id) {
            foreach ($request->mark_delete_id as $id) {
                Subcategory::find($id)->delete();
            }
        }
        return back();
    }
    public function alldelete()
    {
        Subcategory::whereNotNull('id')->delete();
        return back();
    }
}
