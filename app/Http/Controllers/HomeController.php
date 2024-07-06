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
        return view('home', compact('products','categories'));
    }
    public function product()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product', compact('products','categories'));
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('product_details', compact('product'));
    }
    public function add_cart(Request $request,$id)
    {
           $user =   User::find(1);
           $product = Product::find($id);
           $cart = new Cart;
           $cart->name = $user->name;
           $cart->email = $user->email;
           $cart->phone = $user->phone;
           $cart->address = $user->address;
           $cart->user_id = $user->id;

           $cart->product_title = $product->title;
           if($product->discount_price!==null){
            $cart->price = $product->discount_price;
            $cart->total_price = $product->discount_price * $request->quantity;
           }else{
            $cart->price = $product->price;
            $cart->total_price = $product->price * $request->quantity;
           }
           $cart->image = $product->image;
           $cart->product_id = $product->id;

           $cart->quantity = $request->quantity;
           $cart->save();

           return redirect()->back();
        // if(Auth::id())
        // {
        //    $user = Auth::user();
        //    $product = Product::find($id);
        //    $cart = new Cart;
        //    $cart->name = $user->name;
        //    $cart->email = $user->email;
        //    $cart->phone = $user->phone;
        //    $cart->address = $user->address;
        //    $cart->user_id = $user->id;

        //    $cart->product_title = $product->title;
        //    $cart->price = $product->price;
        //    $cart->product_id = $product->id;

        //    $cart->quantity = $request->quantity;
        //    $cart->save();

        //    return redirect()->back();
           

        // }else{
        //     return redirect('login');
        // }

    }
    public function show_cart(){
        $categories = Category::all();
        //$id = Auth::user()->id;
        $id = 1;
        $products = Cart::where("user_id",'=' ,$id)->get();
        return view('cart', compact('products','categories'));
    }
}
