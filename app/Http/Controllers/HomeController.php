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
    public function profile(){
        $categories = Category::all();
        $user = Auth::user();
        return view('site.pages.profile',compact('user','categories'));
    }
    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->phone = $request->post('phone');
        $user->address = $request->post('address');
        $user->city = $request->post('city');
        $user->country = $request->post('country');
        $user->update();
        $request->session()->flash('message', 'User Updated');
        return redirect('profile');
    }
    public function user_order(){
        $categories = Category::all();
        return view('site.pages.order',compact('categories'));
    }
}
