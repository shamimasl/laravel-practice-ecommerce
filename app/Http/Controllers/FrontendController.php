<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Info;
use App\Models\Message;
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
        $info = Info::first();
        return view('contact', [
            'info' => $info,
        ]);
    }
    public function protfolio()
    {
        return view('protfolio');
    }
    public function shop()
    {
        return view('shop', [
            'all_products' => Product::all(),
            'categories' => Category::all()
        ]);
    }
    public function shop_category($category_id)
    {
        return view('shop_category', [
            'category_name' => Category::find($category_id)->category_name,
            'all_products' => Product::where('category_id', $category_id)->get(),
        ]);
    }
    public function search()
    {
        $q = $_GET['q'];
        $al = $_GET['al'];
        if ($al == 1) {
            $products = Product::where('product_name', 'like', '%' . $q . '%')->orderBy('product_name', 'asc')->get();
        } else {

            $products = Product::where('product_name', 'like', '%' . $q . '%')->orderBy('product_name', 'desc')->get();
        }

        return view(
            'search',
            ['search_results' => $products,]
        );
    }
    public function sendMessage(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => "required",
            "subject" => 'required',
            "message" => 'required'
        ]);
        Message::insert([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message,
        ]);

        return back()->with('status', 'Message send successfully');
    }
}
