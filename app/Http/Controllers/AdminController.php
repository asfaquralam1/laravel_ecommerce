<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function category()
    {
        $categories = Category::all();
        return view('admin.category.category', compact('categories'));
    }
    public function manage_category()
    {
        return view('admin.category.add_category');
    }
    public function add_category(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $modal = new Category([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
        ]);
        $modal->save();
        $request->session()->flash('message', 'Category Inserted');
        return redirect('admin/category');
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
        $request->session()->flash('message', 'Category Updated');
        return redirect('admin/category');
    }
    public function delete_category(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();
        $request->session()->flash('warning', 'Category Deleted');
        return redirect('admin/category');
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
        return view('admin.product.product', compact('products'));
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
        ]);

        $modal = new Product([
            'name' => $request->post('name'),
            'category' => $request->post('category'),
            'details' => $request->post('details'),
            'price' => $request->post('price'),
        ]);
        $modal->save();
        $request->session()->flash('message', 'Product Inserted');
        return redirect('admin/product');
    }
    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product.edit_product', compact('product','categories'));
    }
    public function update_product(Request $request, $id)
    {
        $modal = Product::find($id);
        $modal->name = $request->post('name');
        $modal->category = $request->post('category');
        $modal->details = $request->post('details');
        $modal->price = $request->post('price');
        $modal->update();
        $request->session()->flash('message', 'Product Updated');
        return redirect('admin/product');
    }
    public function delete_product(Request $request, $id)
    {
        $category = Product::find($id);
        $category->delete();
        $request->session()->flash('warning', 'Product Deleted');
        return redirect('admin/product');
    }
}
