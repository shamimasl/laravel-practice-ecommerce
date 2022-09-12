<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    public function index()
    {
        return view('coupon.index', [
            'coupons' => Coupon::all(),
        ]);
    }
    public function insert(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'coupon_name' => 'required|unique:coupons,coupon_name',
            'coupon_discount_amount' => 'integer|required|max:99|min:1',
            'coupon_validity_till' => 'required'
        ]);
        Coupon::insert([$request->except('_token') + [
            'created_at' => Carbon::now()
        ]]);
        return back();
    }
}
