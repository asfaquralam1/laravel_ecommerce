<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupon['data'] = Coupon::all();
        return view('admin.coupon',$coupon);
    }
    public function create(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons,code',
            'value' => 'required'
        ]);

        $modal = new Coupon();
        $modal->title = $request->post('title');
        $modal->code = $request->post('code');
        $modal->value = $request->post('value');
        $modal->save();
        $request->session()->flash('message', 'Coupon Inserted');
        return redirect('admin/coupon');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Coupon $coupon)
    {
        return view('admin.manage_coupon');
    }
    public function edit(Coupon $coupon,$id)
    {
        $modal['coupon'] = Coupon::find($id);
        return view('admin.edit_coupon',$modal);
    }
    public function update(Request $request,$id)
    {
        $modal = Coupon::find($id);
        $modal->title = $request->post('title');
        $modal->code = $request->post('code');
        $modal->value = $request->post('value');
        $modal->update();
        $request->session()->flash('message', 'Coupon Updated');
        return redirect('admin/coupon');
    }
    public function destroy(Request $request,$id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        $request->session()->flash('message', 'Coupon Deleted');
        return redirect('admin/coupon');
    }
    public function status(Request $request,$status,$id)
    {
        $coupon = Coupon::find($id);
        $coupon->status= $status;
        $coupon->save();
        $request->session()->flash('message', 'Coupon Status updated');
        return redirect('admin/category');
    }
}
