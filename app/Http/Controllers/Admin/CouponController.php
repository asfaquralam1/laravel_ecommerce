<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
     public function applyCoupon(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string',
            'order_amount' => 'required|numeric|min:1',
        ]);

        $coupon = Coupon::where('code', $request->code)->first();

        if (!$coupon || !$coupon->isValid($request->order_amount)) {
            return response()->json(['error' => 'Invalid or expired coupon.'], 400);
        }

        $discount = $coupon->discountAmount($request->order_amount);
        $finalAmount = $request->order_amount - $discount;

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'final_amount' => $finalAmount,
        ]);
    }
}
