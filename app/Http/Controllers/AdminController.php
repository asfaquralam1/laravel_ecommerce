<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     // Admin guest [the people who are not logged in as admin, will be redirecting to admin login.          
    //     $this->middleware('guest:admin')->except('logout');
    // }
    public function index()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        // Validate login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // if successful, then redirect to their intended location.
            // here intended method is used to redirect the page is requested by admin user after successful login. 
            return redirect()->intended(route('admin.dashboard'));
        }

        // If login fails, redirect back with error
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ])->onlyInput('email');
    }

    public  function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
    public function dashboard()
    {
        $users = User::all();
        $orders = Order::latest()->get();
        $categories = Category::all();
        $products = Product::all();

        return view('admin.dashboard', [
            'total_users' => $users->count(),
            'users' => $users,
            'products' => $products,
            'total_products' => Product::count(),
            'total_orders' => $orders->count(),
            'orders' => $orders,
            'categories' => $categories,
            'total_categories' => Category::count(),
        ]);
    }

    public function order()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }

    public function add_order(Request $request)
    {
        $order = new Order;
        $order->category_id = $request->category_id;
        $order->order_name = $request->order_name;
        $result = $order->save();
        // if ($result) {
        //     return response()->json([
        //         "message" => "Category Inserted",
        //         "code" => 200
        //     ]);
        // } else {
        //     return response()->json([
        //         "message" => "Internal Server Error",
        //         "code" => 500
        //     ]);
        // }
    }
}
