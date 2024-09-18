<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('site.pages.home', compact('products', 'categories'));
    }
    public function product()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('site.pages.product', compact('products', 'categories'));
    }
    public function product_details($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('site.pages.product_details', compact('product', 'categories'));
    }
    public function show_cart()
    {
        $categories = Category::all();
        //$id = Auth::user()->id;
        $id = 1;
        $products = Cart::where("user_id", '=', $id)->get();
        return view('site.pages.cart', compact('products', 'categories'));
    }
    public function add_cart(Request $request, $id)
    {
        $cart = new Cart;
        $cart->quantity = 1;
        $cart->save();
        return redirect()->back();
    }
}
