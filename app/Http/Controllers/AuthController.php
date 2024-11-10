<?php

namespace App\Http\Controllers;

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
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }  
        return back()->withErrors([
            'verify' => 'These credentials do not match',
        ])->withInput($request->only('email')); // Preserve email in the input
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
            'phone' => ['required','regex:/^(?:\+8801[3-9]\d{8}|01[3-9]\d{8})$/'],
            'password' => 'required|confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if ($validator) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            //session()->flash('success','You Have Register successfully');
            return redirect('login')->with('success','You Have Register successfully');
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    public function forgotpass()
    {
       return view('site.auth.change_password');
    }

    public  function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
