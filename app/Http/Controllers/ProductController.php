<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product['data'] = Product::all();
        return view('admin.product',$product);
    }

    public function create(Request $request)
    {

        $request->validate([
            'product_name'=>'required|unique:products',
            'short_desc'=>'required',
            'category_id'=>'required',
            'size_id'=>'required',
            'color_id'=>'required',
            'coupon_id'=>'required',
        ]);

        $modal = new Product();
        $modal->product_name = $request->post('product_name');
        $modal->short_desc = $request->post('short_desc');
        $modal->category_id = $request->post('category_id');
        $modal->size_id = $request->post('size_id');
        $modal->color_id = $request->post('color_id');
        $modal->coupon_id = $request->post('coupon_id');
        $modal->save();
        $request->session()->flash('message', 'Product Inserted');
        return redirect('admin/product');
    }

    public function store()
    {

    }

    public function show()
    {
        $category['category'] = Category::all();
        $color['color'] = Color::all();
        $coupon['coupon'] = Coupon::all();
        $size['size'] = Size::all();
        return view('admin.manage_product',$category,$size)->with($color);
    }

    public function edit(product $product)
    {
        //
    }
    public function update(Request $request, product $product)
    {
        //
    }
    public function destroy(product $product)
    {
        //
    }
    public function status(Request $request,$status,$id)
    {
        $product = Product::find($id);
        $product->status= $status;
        $product->save();
        $request->session()->flash('message', 'product Status updated');
        return redirect('admin/product');
    }
}
