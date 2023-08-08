<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $size['data'] = Size::all();
        return view('admin.size',$size);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show()
    {
        return view('admin.manage_size');
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, Size $size)
    {
        //
    }
    public function destroy(Size $size,Request $request,$id)
    {
        $size = Size::find($id);
        $size->delete();
        $request->session()->flash('message', 'Size Deleted');
        return redirect('admin/size');
    }
    public function status(Request $request,$status,$id)
    {
        $size = Size::find($id);
        $size->status= $status;
        $size->save();
        $request->session()->flash('message', 'Size Status updated');
        return redirect('admin/size');
    }
}
