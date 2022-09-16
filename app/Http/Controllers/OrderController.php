<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Carbon\Carbon as CarbonCarbon;
use App\Models\OrderBillingDetails;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    public function ordercreate(Request $request)
    {
        // print_r($request->all());
        if ($request->cod == 1) {
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'total' => session('total_from_cart'),
                'discount' => session('discount_from_cart'),
                'sub_total' => session('subtotal_from_cart'),
                'payment_status' => $request->cod,
                'created_at' => Carbon::now(),

            ]);
        } elseif ($request->online == 2) {
            $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'total' => session('total_from_cart'),
                'discount' => session('discount_from_cart'),
                'sub_total' => session('subtotal_from_cart'),
                'payment_status' => $request->online,
                'created_at' => Carbon::now(),

            ]);
        }

        OrderBillingDetails::insert([
            'order_id' =>  $order_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country,
            'city_id' => $request->city,
            'address' => $request->address,
            'zipcode' => $request->zipcode,
            'note' => $request->note,
            'created_at' => Carbon::now(),

        ]);
        $cart_items = Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->get();
        foreach ($cart_items as $cart_item) {
            $product_name = Product::find($cart_item->product_id)->product_name;
            $product_price = Product::find($cart_item->product_id)->product_price;
            OrderDetails::insert([
                'order_id' => $order_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $cart_item->cart_amount,
                'created_at' => Carbon::now(),
            ]);
        }
        if ($request->cod == 1) {
            Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->delete();
            return redirect('cart');
        } elseif ($request->online == 2) {
            Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->delete();
            return redirect('online/payment');
        }
    }
}
