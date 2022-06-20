<?php

namespace App\Http\Controllers;

use App\Pack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $packs =Pack::orderBy('order', 'asc')->paginate(10);
        return view('admin.pages.packs.index', ['packs' => $packs]);
    }


    public function create()
    {
        $packs =Pack::all();
        return view('admin.pages.packs.create', ['packs' => $packs]);
    }


    public function store(Request $request)
    {


        $this->validate($request, [
            'title'        => 'required',
            'summary'      => 'required',
            'description'  => 'required',
            'order'        => 'required',
            'price'        => 'required',
            'image'        => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:3000'
        ]);

        $pack               = new Pack();
        dd(Pack::count());

        $pack->title        = $request->title;
        $pack->summary      = $request->summary;
        $pack->description  = $request->description;
        $pack->order        = $request->order;
        $pack->price        = $request->price;
        $pack->save();

        //If we have an image file, we store it, and move it in the database
        if($request->file('image')){
            $imagePath = $request->file('image');
            $imageName = $pack->id . '_' . $pack->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/packs/' . $pack->id, $imageName, 'public');
            $pack->image = $path;
            $pack->save();
        }
        $pack->image = $request->image;


        return redirect()->route('packs.create')->with('status', 'Pack criado com sucesso!');
    }


    public function show(Pack $pack)
    {
        //
    }


    public function edit(Pack $pack)
    {
        //
    }



    public function update(Request $request, Pack $pack)
    {
        //
    }


    public function destroy(Pack $pack)
    {
        //
    }
}
