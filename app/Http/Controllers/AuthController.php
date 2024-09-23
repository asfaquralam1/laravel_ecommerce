<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'phone' => 'required|phone|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);
        if ($validator) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            session()->flash('success','You Have Register successfully');
            // return response()->json([
            //     'status' => true,
            // ]);
            return redirect('login');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public  function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
