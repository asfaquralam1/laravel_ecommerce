<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
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
    public function checkout_view()
    {
        $user = Auth::user();
        if ($user !== null) {
            $cart = session()->get('cart');
            if ($cart !== []) {
                $categories = Category::all();
                $products = Product::all();
                return view('site.pages.checkout', compact('products', 'categories', 'user'));
            }
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function place_order(Request $request)
    {
        // //if cart is empty redirect to cart page
        // if (Cart::count() == 0) {
        //     return redirect()->route('login');
        // }
        // //--if user is not logged in then
        // if (Auth::check() == false) {
        //     //--get back to last page
        //     if (!session()->has('url.intended')) {
        //         session(['url.intended' => url()->current()]);
        //     }
        //     return redirect()->route('login');
        // }
        $order = new Order();
        $order->user_id = $request->post('user_id');
        $order->subtotal = $request->post('subtotal');
        $order->city = $request->post('city');
        $order->shipping = $request->post('shipping');
        $order->coupon_code = $request->post('coupon_code');
        $order->discount = $request->post('discount');
        $order->grand_total = $request->post('grand_total');
        //user
        $order->name = $request->post('name');
        $order->email = $request->post('email');
        $order->phone = $request->post('phone');
        $order->address = $request->post('address');
        $order->apartment = $request->post('apartment');
        $order->city = $request->post('city');
        $order->district = $request->post('district');
        $order->zip = $request->post('zip');
        $order->country = $request->post('country');

        $order->save();
        // when order is placed we set order_id to cart for that cart and set cart ip_address to null as it is used
        // for guest only.
        // foreach (Cart::totalCarts() as $cart) {
        //     $cart->order_id = $order->id;
        //     $cart->ip_address = NULL;
        //     $cart->save();
        // }
        return redirect()->route('checkout.payment', $order->id);
    }
    public function checkoutPayment($id)
    {
        $categories = Category::all();
        //getting the order for the respective user.
        $order = Order::where('id', $id)->first();
        return view('site.pages.payment', compact('order','categories'));
    }
    public function profile()
    {
        $categories = Category::all();
        $user = Auth::user();
        return view('site.pages.profile', compact('user', 'categories'));
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
    public function user_order()
    {
        $categories = Category::all();
        return view('site.pages.order', compact('categories'));
    }
}
