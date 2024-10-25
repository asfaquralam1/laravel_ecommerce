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
        $shipping_cost = (float)config('settings.delivery_charge');
        $sub_total = Cart::calculateSubtotal();
        $vat = $sub_total * (config('settings.tax_percentage') / 100);
        $grand_total = $sub_total + $shipping_cost + $vat;

        // finding last order id: we use it for customer order id (customized) for billing purpose
        // it will be false only for the first record.
        if (!Order::orderBy('id', 'desc')->first()) {
            $ord_id = 0;
        } else {
            $ord_id = Order::orderBy('id', 'desc')->first()->id;
        }
        $ord_id = '#' . (100000 + ($ord_id + 1));

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->order_number = $ord_id;
        $order->payment_method = 'Cash';
        $order->bank_tran_id = 'N/A';
        $order->status = 'pending';
        $order->payment_status = 0;
        $order->grand_total = $grand_total;
        $order->item_count = Cart::totalItems();
        //user
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->apartment = $request->apartment;
        $order->city = $request->city;
        $order->district = $request->district;
        $order->zip = $request->zip;
        $order->country = $request->country;
        $order->delivery_date = $request->delivery_timings;
        $order->order_date = \Carbon\Carbon::now()->toDateTimeString();
        $order->save();
        // when order is placed we set order_id to cart for that cart and set cart ip_address to null as it is used
        // for guest only.
        // foreach (Cart::totalCarts() as $cart) {
        //     $cart->order_id = $order->id;
        //     $cart->ip_address = NULL;
        //     $cart->save();
        // }
        // event(new OrderPlaced($order->order_number));

        return redirect()->route('checkout.payment', $order->id);
    }
    public function checkoutPayment($id)
    {
        $categories = Category::all();
        //getting the order for the respective user.
        $order = Order::where('id', $id)->first();
        return view('site.pages.payment', compact('order', 'categories'));
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
        $orders = Order::all()->where('id', Auth::id());
        return view('site.pages.order', compact('categories', 'orders'));
    }
    public function contact()
    {
        $categories = Category::all();
        return view('site.pages.contact', compact('categories'));
    }
    public function task(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $categories = new Category();
        $categories->name = $request->post('name');
        $categories->slug = $request->post('slug');
        $categories->save();
        $request->session()->flash('message', 'Your message has been sent successfully');
        return redirect('contact');
    }
}
