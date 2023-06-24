<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category['data'] = Category::all();
        return view('admin.category',$category);
    }
    public function manage_category()
    {
        return view('admin.manage_category');
    }
    public function add_category(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories',
        ]);

        $modal = new Category();
        $modal->category_name = $request->post('category_name');
        $modal->category_slug = $request->post('category_slug');
        $modal->save();
        $request->session()->flash('message', 'Category Inserted');
        return redirect('admin/category');
    }
    public function edit_category(Request $request,$id)
    {
        $modal['category'] = Category::find($id);
        return view('admin.edit_category',$modal);
    }
    public function update_category(Request $request,$id)
    {
        $modal = Category::find($id);
        $modal->category_name = $request->post('category_name');
        $modal->category_slug = $request->post('category_slug');
        //dd($category);
        $modal->update();
        $request->session()->flash('message', 'Category Updated');
        return redirect('admin/category');
    }
    public function delete_category(Request $request,$id)
    {
        $category = Category::find($id);
        //dd($category);
        $category->delete();
        $request->session()->flash('message', 'Category Deleted');
        return redirect('admin/category');
    }
}
