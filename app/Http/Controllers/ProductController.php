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
        $category['data'] = Category::all();
        $color['data'] = Color::all();
        $coupon['data'] = Coupon::all();
        $size['data'] = Size::all();
        return view('admin.product',$product,$category,$color,$size,$coupon);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(product $product)
    {
        return view('admin.manage_product');
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
}
