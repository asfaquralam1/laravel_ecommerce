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

    public function category_product($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $category_name = $category->name;
        $products = Product::where('category',$category_name)->get();
        return view('site.pages.category_product', compact('products', 'categories','category_name'));
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
        $related_products = Product::where('id','!=',1)
        ->distinct()
        ->get();
        $product->thumbnail = json_decode($product->thumbnail);

        return view('site.pages.product_details', compact('product', 'categories','related_products'));
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
        // $sub_total = Cart::calculateSubtotal();
        $sub_total = $request->subtotal;
        // $vat = $sub_total * (config('settings.tax_percentage') / 100);
        $vat = $sub_total * (5 / 100);
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
        //$order->item_count = Cart::totalItems();
        $item_count = count(session('cart'));
        $order->item_count = $item_count;
        //user
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->apartment = $request->apartment;
        $order->city = $request->city;
        $order->district = $request->district;
        // $order->zip = $request->zip;
        //$order->country = $request->country;
        //$order->delivery_date = $request->delivery_timings;
        //$order->order_date = \Carbon\Carbon::now()->toDateTimeString();
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
        // Step 1: Validate the incoming data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ]);

        // Step 2: Get the authenticated user
        $user = User::findOrFail(Auth::id());

        // Step 3: Use mass assignment for simplicity (be sure to define the $fillable property in your User model)
        $user->update($validatedData);

        // Step 4: Flash a success message and redirect
        $request->session()->flash('message', 'User Updated');
        return redirect()->route('profile')->with('success', 'Your Profile is Updated');
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
