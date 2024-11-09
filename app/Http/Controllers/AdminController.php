<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ], $request->get('remember'))){
            return redirect()->intended(route('admin.dashboard'));
        }
        else {
            return redirect()->back()->withInput($request->only('email','remmember'));
        }
    }
    public  function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
    public function dashboard()
    {
        $orders = DB::table('orders')->count();
        $categories = DB::table('categories')->count();
        $users = DB::table('users')->count();
        $products = DB::table('products')->count();
        return view('admin.dashboard', compact('users', 'categories', 'orders', 'products'));
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
    public function category()
    {
        $categories = Category::all();
        return view('admin.category.manage_category', compact('categories'));
    }
    public function manage_category()
    {
        return view('admin.category.add_category');
    }
    public function add_category(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'slug' => 'required|unique:categories',
        // ]);

        // $modal = new Category([
        //     'name' => $request->post('name'),
        //     'slug' => $request->post('slug'),
        // ]);
        // $modal->save();
        Category::create(array_merge($request->only(['name', 'slug'])));
        return redirect('admin/category')->with('success','Category Added Successfully');
    }
    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit_category', compact('category'));
    }
    public function update_category(Request $request, $id)
    {
        $modal = Category::find($id);
        $modal->name = $request->post('name');
        $modal->slug = $request->post('slug');
        $modal->update();
        // $request->session()->flash('message', 'Category Updated');
        return redirect('admin/category')->with('success','Category Updated Successfully');
    }
    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        //$request->session()->flash('warning', 'Category Deleted');
        return redirect('admin/category')->with('warning','Category Deleted');
    }
    public function status(Request $request, $status, $id)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        $request->session()->flash('message', 'Category Status updated');
        return redirect('admin/category');
    }
    public function product()
    {
        $products = Product::all();
        return view('admin.product.manage_product', compact('products'));
    }
    public function manage_product()
    {
        $categories = Category::all();
        return view('admin.product.add_product', compact('categories'));
    }
    public function add_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'details' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'quantity' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $modal = new Product([
        //     'name' => $request->post('name'),
        //     'category' => $request->post('category'),
        //     'details' => $request->post('details'),
        //     'price' => $request->post('price'),
        // ]);
        $modal = new Product;
        $modal->name = $request->name;
        $modal->category = $request->category;
        $modal->details = $request->details;
        $modal->price = $request->price;
        $modal->discount_price = $request->discount_price;
        $modal->quantity = $request->quantity;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Resize the image
            // $imgsize = Image::make($image)->resize(800, 600);
            // Set your desired resolution
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $modal->image = $imagename;
        }
        $modal->save();
        // $request->session()->flash('message', 'Product Inserted');
        return redirect('admin/product')->with('success','Product Added Successfully');
    }
    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit_product', compact('product', 'categories'));
    }
    public function update_product(Request $request, $id)
    {
        $modal = Product::find($id);
        $modal->name = $request->post('name');
        $modal->category = $request->post('category');
        $modal->details = $request->post('details');
        $modal->price = $request->post('price');
        $modal->discount_price = $request->post('discount_price');
        $modal->quantity = $request->post('quantity');
        if ($request->hasFile('image')) {
            $destination = 'product/' . $modal->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('product/', $filename);
            $modal->image = $filename;
        }
        $modal->update();
        $request->session()->flash('message', 'Product Updated');
        return redirect('admin/product');
    }
    public function delete_product($id)
    {
        $category = Product::find($id);
        $category->delete();
        return redirect('admin/product');
    }
}
