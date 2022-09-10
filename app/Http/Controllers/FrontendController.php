<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller

{
    public function index()
    {
        return view('welcome', [
            'categories' => Category::latest()->get(),
            'products' => Product::latest()->get(),
        ]);
    }
    public function product_details($product_id)
    {
        $category_id = Product::find($product_id)->category_id;
        return view('productdetails', [
            'product_info' => Product::find($product_id),
            'related_products' => Product::where('category_id', $category_id)->where('id', '!=', $product_id)->get(),
        ]);
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function protfolio()
    {
        return view('protfolio');
    }
}
