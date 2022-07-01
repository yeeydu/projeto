<?php

namespace App\Http\Controllers;

use App\Fotografia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;

class FotografiaController extends Controller
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
        $fotografias = Fotografia::orderBy('order', 'asc')->paginate(10);
        return view('admin.pages.fotografias.index', ['fotografias' => $fotografias]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.pages.fotografias.create', ['categorias' => $category]);
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
            'category_id'  => 'required',
            'order'        => 'required',
            'image'        => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048'
        ]);

        $fotografia               = new Fotografia();
        $fotografia->title        = $request->title;
        $fotografia->description  = $request->description;
        $fotografia->category_id  = $request->category_id;
        $fotografia->order        = $request->order;
        $fotografia->save();

        //If we have an image file, we store it, and move it in the database
        if($request->file('image')){
            $imagePath = $request->file('image');
            $imageName = $fotografia->id . '_' . $fotografia->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/fotografias/' . $fotografia->id, $imageName, 'public');
            $fotografia->image = $path;
            $fotografia->save();
        }
        $fotografia->image = $request->image;

        return redirect('admin/fotografias')->with('status', 'Item created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function show(Fotografia $fotografia)
    {

        return view('admin.pages.fotografias.show', ['fotografia' => $fotografia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function edit(Fotografia $fotografia)
    {
        $category = Category::all();

        return view('admin.pages.fotografias.edit', ['fotografia' => $fotografia, 'categorias' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fotografia $fotografia)
    {

        $fotografia->update($request->all());
        $fotografia = Fotografia::find($fotografia->id);
        $fotografia->title        = $request->title;
        $fotografia->description  = $request->description;
        $fotografia->category_id  = $request->category_id;
        $fotografia->order        = $request->order;
        $fotografia->save();


        if($request->hasfile('image')){
            Storage::deleteDirectory('public/images/fotografias/' . $fotografia->id);
            $imagePath = $request->file('image');
            $imageName = $fotografia->id . '_' . $fotografia->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/fotografias/' . $fotografia->id, $imageName, 'public');
            $fotografia->image = $path;
            $fotografia->save();
        }
        return redirect('admin/fotografias')->with('status', 'Item edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fotografia  $fotografia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotografia $fotografia)
    {
       Storage::deleteDirectory('public/images/fotografias/' . $fotografia->id);
       $fotografia->delete();

       return redirect('admin/fotografias')->with('status', 'Item deleted successfully');
    }
}
