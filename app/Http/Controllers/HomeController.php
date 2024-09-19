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
    public function checkout()
    {
        //if cart is empty redirect to cart page
        if (Cart::count() == 0) {
            return redirect()->route('login');
        }
        //--if user is not logged in then
        if (Auth::check() == false) {
            //--get back to last page
            if (!session()->has('url.intended')) {
                session(['url.intended' => url()->current()]);
            }
            return redirect()->route('login');
        }

        $categories = Category::all();
        $products = Product::all();
        return view('site.pages.checkout', compact('products', 'categories'));
    }
}
