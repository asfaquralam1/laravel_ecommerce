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
            'color'=>'required|unique:colors',
        ]);

        $modal = new Color();
        $modal->color= $request->post('color');
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
    public function show()
    {
        return view('admin.manage_color');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modal['color'] = Color::find($id);
        return view('admin.edit_color',$modal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $modal = Color::find($id);
        $modal->color = $request->post('color');
        $modal->update();
        $request->session()->flash('message', 'Color Updated');
        return redirect('admin/color');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $color = Color::find($id);
        $color->delete();
        $request->session()->flash('message', 'Coupon Deleted');
        return redirect('admin/color');
    }
    public function status(Request $request,$status,$id)
    {
        $color = Color::find($id);
        $color->status= $status;
        $color->save();
        $request->session()->flash('message', 'color Status updated');
        return redirect('admin/color');
    }
}
