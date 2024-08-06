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
        return view('home', compact('products', 'categories'));
    }
    public function product()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product', compact('products', 'categories'));
    }
    public function product_details($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('product_details', compact('product', 'categories'));
    }
}
