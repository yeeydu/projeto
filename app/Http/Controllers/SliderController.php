<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  __construct()
    {
        $this->middleware('auth');  
    }

    public function index()
    {
        $sliders = Slider::orderBy('title', 'asc')->paginate(10);
        return view('admin.admin', ['sliders' => $sliders]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pages.sliders.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'        => 'required',
            'description'  => 'required',
            'image'        => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048'
        ]);
        
        $slider               = new Slider();
        $slider->title        = $request->title;
        $slider->description  = $request->description;
        $slider->save();
        
        //If we have an image file, we store it, and move it in the database
        if($request->file('image')){
            $imagePath = $request->file('image');
            $imageName = $slider->id . '_' . $slider->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/slider/' . $slider->id, $imageName, 'public');
            $slider->image = $path;
            $slider->save();
        }
        $slider->image        = $request->image;

        return redirect('admin/')->with('status', 'Item created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.pages.sliders.show', ['slider' => $slider]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.sliders.edit', ['slider' => $slider ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->update($request->all());
        $slider = Slider::find($slider->id);
        $slider->title        = $request->title;
        $slider->description  = $request->description;
        $slider->save();

       
        if($request->hasfile('image')){
            Storage::deleteDirectory('public/images/slider/' . $slider->id);
            $imagePath = $request->file('image');
            $imageName = $slider->id . '_' . $slider->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/slider/' . $slider->id, $imageName, 'public');
            $slider->image = $path;
            $slider->save();
        }
        return redirect('admin/')->with('status', 'Item edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        Storage::deleteDirectory('public/images/sliders/' . $slider->id);
        $slider->delete();
 
        return redirect('admin/ ')->with('status', 'Item deleted successfully');
    }
}
