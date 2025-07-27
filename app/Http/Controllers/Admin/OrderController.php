<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }
     public function add_order(Request $request)
    {
        $order = new Order;
        $order->category_id = $request->category_id;
        $order->order_name = $request->order_name;
        $result = $order->save();
        // if ($result) {
        //     return response()->json([
        //         "message" => "Category Inserted",
        //         "code" => 200
        //     ]);
        // } else {
        //     return response()->json([
        //         "message" => "Internal Server Error",
        //         "code" => 500
        //      ]);
        // }
    }
}
