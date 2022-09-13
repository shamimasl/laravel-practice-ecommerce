<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {
        if (Cookie::get('generated_cart_id')) {
            $randomly_generated_cart_id = Cookie::get('generated_cart_id');
        } else {
            $randomly_generated_cart_id = Str::random(5) . time();
            Cookie::queue(Cookie::make('generated_cart_id', $randomly_generated_cart_id, 7200));
        }

        if (Cart::where('generated_cart_id', $randomly_generated_cart_id)->where('product_id', $request->product_id)->exists()) {
            Cart::where('generated_cart_id', $randomly_generated_cart_id)->where('product_id', $request->product_id)->increment('cart_amount', $request->cart_amount);
        } else {

            Cart::insert([
                'generated_cart_id' => $randomly_generated_cart_id,
                'product_id' => $request->product_id,
                'cart_amount' => $request->cart_amount,
                'created_at' => Carbon::now(),
            ]);
        }
        return back()->with('cart_success', 'product added to cart successfully');
    }

    public function cartdelete($cart_id)
    {
        Cart::find($cart_id)->forceDelete();
        return back();
    }
    public function cart($coupon_name = "")
    {
        if ($coupon_name == "") {
            $discount = 0;
        } else {
            if (Coupon::where('coupon_name', $coupon_name)->exists()) {
                if (Carbon::now()->format('y-m-d') < Coupon::where('coupon_name', $coupon_name)->first()->coupon_validity_till) {

                    return back()->with('coupon_error', 'This coupon has expired');
                } else {
                    $discount =  Coupon::where('coupon_name', $coupon_name)->first()->coupon_discount_amount;
                }
            } else {
                return back()->with('coupon_error', 'This coupon does not exist');
            }
        }

        return view('cart', [
            'coupon_name' => $coupon_name,
            'discount' => $discount,
            'cart_items' => Cart::where('generated_cart_id', Cookie::get('generated_cart_id'))->get(),
        ]);
    }
    public function updatecart(Request $request)
    {
        foreach ($request->cart_amount as $cart_id => $amount) {
            Cart::find($cart_id)->update([
                'cart_amount' => $amount,
            ]);
        }
        return back();
    }
    public function checkout()
    {
        return view('checkout');
    }
}
