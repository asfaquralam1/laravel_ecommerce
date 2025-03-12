<?php
namespace App\Repositories;
use App\Models\Category;

class CategoryRepository{
    public function all(){
        return Category::all();
    }
    public function store($data){
        Category::create($data);
    }
    public function find($id){
        return Category::where('id',$id)->first();
    }
    public function update($data,$id){
        $modal = Category::find($id);
        $modal->name = $data['name'];
        $modal->slug = $data['slug'];
        $modal->update(); 
    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
    }
}