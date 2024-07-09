<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
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

           $cart->product_title = $product->name;
           if($product->discount_price > 0){
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
    public function delete_cart(Request $request,$id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        $request->session()->flash('warning', 'Cart Deleted');
        return redirect('show_cart');
    } 
    public function increaseQuantity(Request $request)
    {
        $productId = $request->id;

        // Example logic - Increase quantity in session/cart
        $currentQuantity = session()->get("cart.$productId.quantity", 0);
        $newQuantity = $currentQuantity + 1;
        session()->put("cart.$productId.quantity", $newQuantity);

        return response()->json(['quantity' => $newQuantity]);
    }

    public function decreaseQuantity(Request $request)
    {
        $productId = $request->id;

        // Example logic - Decrease quantity in session/cart
        $currentQuantity = session()->get("cart.$productId.quantity", 0);
        $newQuantity = max(1, $currentQuantity - 1); // Ensure quantity doesn't go below 1
        session()->put("cart.$productId.quantity", $newQuantity);

        return response()->json(['quantity' => $newQuantity]);
    }
}
