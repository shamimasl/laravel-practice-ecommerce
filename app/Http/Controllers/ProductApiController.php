<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_thumbnail_photo;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();

        return response()->json(['products' => $products]);
    }
    public function singleProduct($id)
    {
        $product = Product::find($id);
        $photos = Product_thumbnail_photo::where('product_id', $id)->get();
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return response()->json(['product' => $product, 'photos' => $photos, 'related_products' => $related_products]);
    }
    public function search(Request $request)
    {
        $products = Product::where('product_name', 'like', '%' . $request->product_name . '%')->orderBy('product_name', 'asc')->get();
        return response()->json([
            'products' => $products
        ]);
    }
}
