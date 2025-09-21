<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index',compact('coupons'));
    }
     public function create()
    {
        return view('admin.coupon.create');
    }

    // Store coupon
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:coupons,code|max:50',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'expires_at' => 'nullable|date|after:today',
            'is_active' => 'nullable|boolean',
        ]);

        Coupon::create([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'min_order_amount' => $request->min_order_amount ?? 0,
            'expires_at' => $request->expires_at,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.coupons')->with('success', 'Coupon created successfully!');
    }
     public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit', compact('coupon'));
    }
    public function update(Request $request, $id)
    {   
        $request->validate([
            'code' => 'required|unique:coupons,code,'.$id.'|max:50',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'expires_at' => 'nullable|date|after:today',
            'is_active' => 'nullable|boolean',
        ]);

        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->back()->with('error', 'Coupon not found.');
        }

        $coupon->update([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'min_order_amount' => $request->min_order_amount ?? 0,
            'expires_at' => $request->expires_at,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.coupons')->with('success', 'Coupon Updated Successfully');
    }
    public function status($status, $id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->back()->with('error', 'Coupon not found.');
        }

        $coupon->is_active = $status;
        $coupon->save();
        return redirect()->back()->with('success', 'Coupon status updated successfully!');
    }
     public function applyCoupon(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string',
            'order_amount' => 'required|numeric|min:1',
        ]);

        $coupon = coupon::where('code', $request->code)->first();

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
    public function delete($id)
    {
        $coupon = Coupon::find($id);
        if (!$coupon) {
            return redirect()->back()->with('error', 'Coupon not found.');
        }

        $coupon->delete();
        return redirect()->back()->with('warning', 'Coupon deleted successfully!');
    }
}
