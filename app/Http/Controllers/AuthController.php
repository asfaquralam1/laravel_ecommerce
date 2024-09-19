<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('site.auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $categories = Category::all();
        $products = Product::all();

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return view('site.pages.home', compact('products', 'categories'));
        } else {
            return redirect()->route('login')->with('error', 'Either Email/Password is incorrect');
        }
    }
    public function register_view()
    {
        return view('site.auth.register');
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5'
        ]);
        if ($validator->passes()) {
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
}
