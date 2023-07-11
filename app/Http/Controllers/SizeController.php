<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'size'=>'required',
        ]);

        $modal = new Size();
        $modal->size = $request->post('size');
        $modal->save();
        $request->session()->flash('message', 'Size Inserted');
        return redirect('admin/size');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function show(Size $size)
    {
        return view('admin.manage_size');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size,$id)
    {
        $modal['size'] = Size::find($id);
        return view('admin.edit_size',$modal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size,$id)
    {
        $modal = Size::find($id);
        $modal->size = $request->post('size');
        $modal->update();
        $request->session()->flash('message', 'Size Updated');
        return redirect('admin/size');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Size  $size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
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
