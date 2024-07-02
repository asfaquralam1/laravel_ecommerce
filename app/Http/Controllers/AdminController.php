<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // $modal->category_name = $request->post('category_name');
        // $modal->category_slug = $request->post('category_slug');
        // $modal->status = 1;
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
        return view('admin.product.product');
    }
}
