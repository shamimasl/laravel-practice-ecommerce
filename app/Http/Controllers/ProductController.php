<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'categories' => Category::all(),
            'subcategories' => Subcategory::all(),
            'products' => Product::all(),
        ]);
    }
    public function insert(Request $request)
    {
        // print_r($request->all());
        $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            // 'product_photo' => $request->product_photo,
            'created_at' => Carbon::now()
        ]);
        echo $product_id;

        $photo = $request->file('product_photo');
        $photo_name = $product_id . "." . $photo->getClientOriginalExtension();

        Image::make($photo)->save(base_path('public/uploads/product_photos/' . $photo_name));
        Product::find($product_id)->update([
            'product_photo' => $photo_name,
        ]);


        return back();
    }
}
