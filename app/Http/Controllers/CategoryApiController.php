<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function getCategory()
    {
        $categories = Category::all();
        return response()->json(['categories' => $categories]);
    }
    public function categoryWiseProduct($category_id)
    {
        $products = Product::where('category_id', $category_id)->get();
        return response()->json(['products' => $products]);
    }
    public function subCategoryWiseProduct($category_id)
    {
        $products = Product::where('sub_category_id', $category_id)->get();
        return response()->json(['products' => $products]);
    }
    public function categoryWiseSubCategory($category_id)
    {
        $sub_categories = Subcategory::where('category_id', $category_id)->get();
        return response()->json(['sub_categories' => $sub_categories]);
    }
}
