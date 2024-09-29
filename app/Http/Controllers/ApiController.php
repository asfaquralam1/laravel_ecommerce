<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ApiController extends Controller{
    public function category(){
        return Category::all();
    }
    public function product(){
        return Product::all();
    }
}