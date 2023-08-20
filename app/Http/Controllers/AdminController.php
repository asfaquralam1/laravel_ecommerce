<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->put('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
    }
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email' => $email, 'password' => $password])->get();
        if($result) {
            if (Hash::check($password, $result->password)) {
                //generating a admin login session
                $request->session()->put('ADMIN_LOGIN', true);
                //passing admin id
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error', 'Please enter valid password');
                return redirect('admin');
            }
        } else {
            $request->session()->flash('error', 'Please enter valid login details');
            return redirect('admin');
        }
    }
    public function updatepassword()
    {
        $r = Admin::find(1);
        $r->password = Hash::make('ahsansagor445');
        $r->save();
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
