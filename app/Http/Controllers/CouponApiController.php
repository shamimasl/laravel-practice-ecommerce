<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponApiController extends Controller
{
    public function getCoupon()
    {
        $coupons = Coupon::all();
        return response()->json(['coupons' => $coupons]);
    }
}
