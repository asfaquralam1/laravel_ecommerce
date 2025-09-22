<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('site.pages.home', compact('products', 'categories'));
    }

    public function pagenotfound()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('site.pages.errors.404', compact('products', 'categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        // Example: search in product names
        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        $categories = Category::all();

        return view('site.partials.product-list', compact('products', 'categories', 'query'));
    }

    public function filter(Request $request)
    {
        $query = Product::query();

        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [
                $request->min_price,
                $request->max_price
            ]);
        }

        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        $categories = Category::all();

        $products = $query->paginate(12);
        return view('site.pages.product', compact('products', 'categories'));
    }


    public function category_product($name)
    {
        $category_name = $name;
        $categories = Category::all();
        $category = Category::where('name', $name)->first();

        if (!$category) {
            abort(404, 'Category not found');
        }

        $category_id = $category->id;
        $products = Product::where('category_id', $category_id)->get();

        return view('site.pages.category_product', compact('products', 'categories', 'category_name'));
    }

    public function product()
    {
        $categories = Category::all();
        $products = Product::all();
        // $products = $query->paginate(12);
        return view('site.pages.product', compact('products', 'categories'));
    }

    public function product_details($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $related_products = Product::where('id', '!=', 1)
            ->distinct()
            ->get();
        $product->thumbnail = json_decode($product->thumbnail);

        return view('site.pages.product_details', compact('product', 'categories', 'related_products'));
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('is_active', 1)
            ->where(function ($q) {
                $q->whereNull('expires_at')
                    ->orWhere('expires_at', '>=', now());
            })
            ->first();

        if (!$coupon) {
            return back()->withErrors(['coupon_code' => 'Invalid or expired coupon.']);
        }

        // Check if user already used this coupon
        $alreadyUsed = DB::table('coupon_user')
            ->where('coupon_id', $coupon->id)
            ->where('user_id', auth()->id())
            ->exists();

        if ($alreadyUsed) {
            return back()->withErrors(['coupon_code' => 'You have already used this coupon.']);
        }

        // Calculate subtotal
        $cartTotal = 0;
        foreach (session('cart', []) as $item) {
            $price = isset($item['discount_price']) && $item['discount_price'] > 0
                ? $item['discount_price']
                : $item['price'];
            $cartTotal += $price * $item['quantity'];
        }

        if ($cartTotal < $coupon->min_order_amount) {
            return back()->withErrors(['coupon_code' => 'Order total must be at least ' . $coupon->min_order_amount]);
        }

        $discount = $coupon->type === 'percent'
            ? ($cartTotal * ($coupon->value / 100))
            : $coupon->value;

        session()->put('coupon', [
            'code' => $coupon->code,
            'discount' => $discount,
        ]);

        return back()->with('success', 'Coupon applied successfully!');
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
        return back()->with('success', 'Coupon removed successfully!');
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
        //$order->tran_id = uniqid();
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
        //$order->zip = $request->zip;
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
