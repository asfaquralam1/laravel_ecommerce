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
        $category = Category::all();
        return view('admin.category',$category);
    }
    public function manage_category()
    {
        return view('admin.manage_category');
    }
    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories',
        ]);

        $modal = new Category();
        $modal->category_name = $request->post('category_name');
        $modal->category_slug = $request->post('category_slug');
        $modal->save();
        $request->session()->flash('message', 'Category inserted');
        return redirect('admin/category');
    }
}
