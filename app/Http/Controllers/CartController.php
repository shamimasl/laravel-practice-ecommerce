<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addtocart()
    {
        $randomly_generated_cart_id = Str::random(5) . time();
        Cookie::queue(Cookie::make('generated_cart_id', $randomly_generated_cart_id, 7200));
        // echo Cookie::get('1');
    }
}
