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
    public function create(Request $request)
    {
        $request->validate([
            'size_name'=>'required|unique:sizes',
        ]);

        $modal = new Size();
        $modal->size_name= $request->post('size_name');
        $modal->save();
        $request->session()->flash('message', 'Size Inserted');
        return redirect('admin/size');
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
        $modal['size'] = Size::find($id);
        return view('admin.edit_size',$modal);
    }
    public function update(Request $request, $id)
    {
        $modal = Size::find($id);
        $modal->size_name = $request->post('size_name');
        $modal->update();
        $request->session()->flash('message', 'Size Updated');
        return redirect('admin/size');
    }
    public function destroy(Size $size,Request $request,$id)
    {
        $size = Size::find($id);
        $size->delete();
        $request->session()->flash('warning', 'Size Deleted');
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
