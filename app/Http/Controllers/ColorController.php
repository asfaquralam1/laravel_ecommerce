<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color['data'] = Color::all();
        return view('admin.color',$color);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'color'=>'required',
            'size'=>'required',
        ]);

        $modal = new Color();
        $modal->color = $request->post('color');
        $modal->size = $request->post('size');
        $modal->save();
        $request->session()->flash('message', 'Color Inserted');
        return redirect('admin/color');
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
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        return view('admin.color');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color,$id,Request $request)
    {
        $color = Color::find($id);
        //dd($category);
        $color->delete();
        $request->session()->flash('message', 'Color Deleted');
        return redirect('admin/color');
    }
    public function status(Request $request,$status,$id)
    {
        $size = Color::find($id);
        $size->status= $status;
        $size->save();
        $request->session()->flash('message', 'Size Status updated');
        return redirect('admin/size');
    }
}
