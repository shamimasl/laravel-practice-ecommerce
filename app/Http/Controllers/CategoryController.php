<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller

{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);
        Category::insert([
            "category_name" => $request->category_name,
            "added_by" => Auth::id(),
            "created_at" => Carbon::now()

        ]);
        return back()->with('status', 'category added successfully');
    }
    public function delete($id)
    {
        Category::find($id)->delete();
        return back();
    }
}