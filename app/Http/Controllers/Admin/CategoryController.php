<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('admin.category.manage_category', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.add_category');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        // $modal = new Category([
        //     'name' => $request->post('name'),
        //     'slug' => $request->post('slug'),
        // ]);
        // $modal->save();
        // Category::create(array_merge($request->only(['name', 'slug'])));
        $this->categoryRepository->store($data);
        return redirect()->route('admin.category')->with('success', 'Category Added Successfully');
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        return view('admin.category.edit_category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        //$request->session()->flash('message', 'Category Updated');
        
        $this->categoryRepository->update($request->all(),$id);
        return redirect()->route('admin.category')->with('success', 'Category Updated Successfully');
    }

    public function delete($id)
    {
        //$request->session()->flash('warning', 'Category Deleted');

        $this->categoryRepository->delete($id);
        return redirect()->route('admin.category')->with('warning', 'Category Deleted');
    }

    public function status(Request $request, $status, $id)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        $request->session()->flash('message', 'Category Status updated');
        return redirect()->route('admin.category');
    }
}
