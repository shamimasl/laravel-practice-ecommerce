<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderBillingDetails;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderApiController extends Controller
{
    public function getOrders($id)
    {
        $orders = DB::table('orders')->join('order_billing_details', 'order_billing_details.order_id', '=', 'orders.id')->join('order_details', 'order_details.order_id', '=', 'order_billing_details.order_id')->where('user_id', $id)->get();

        // foreach ($orders as $order) {
        //     $billing[] = OrderBillingDetails::where('order_id', $order->id)->get();
        // }
        // 
        // $oder_details = OrderDetails::where('order_id', $orders->id)->get();
        return response()->json([
            'orders' => $orders,
            // 'billing' => $billing,
            // 'order_details' => $oder_details
        ]);
    }
}
