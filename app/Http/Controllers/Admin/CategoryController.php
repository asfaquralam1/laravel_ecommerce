<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
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
        return redirect('admin/category')->with('success', 'Category Added Successfully');
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
        //$request->session()->flash('message', 'Category Updated');
        return redirect('admin/category')->with('success', 'Category Updated Successfully');
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        //$request->session()->flash('warning', 'Category Deleted');
        return redirect('admin/category')->with('warning', 'Category Deleted');
    }

    public function status(Request $request, $status, $id)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        $request->session()->flash('message', 'Category Status updated');
        return redirect('admin/category');
    }
}
