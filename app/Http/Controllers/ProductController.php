<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_thumbnail_photo;
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

        $start = 1;
        foreach ($request->file('product_thumbnail_photos') as $single_product_thumbnail_photo) {


            $single_product_thumbnail_photo_name = $product_id . "-" . $start . "." . $single_product_thumbnail_photo->getClientOriginalExtension();
            Image::make($single_product_thumbnail_photo)->save(base_path('public/uploads/product_thumbnail_photos/' . $single_product_thumbnail_photo_name));
            $start++;
            Product_thumbnail_photo::insert([
                'product_id' => $product_id,
                'product_thumbnail_photo_name' => $single_product_thumbnail_photo_name,
                'created_at' => Carbon::now(),
            ]);
        }


        return back();
    }
}
