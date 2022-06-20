<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
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
        $paginas = Pagina::orderBy('title', 'desc')->paginate(10);
        return view('admin.pages.paginas.index', ['paginas' => $paginas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $paginas = Pagina::all();
        return view('admin.pages.paginas.create', ['paginas' => $paginas]);

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

        $pagina               = new Pagina();
        $pagina->title        = $request->title;
        $pagina->description  = $request->description;
        $pagina->save();

        //If we have an image file, we store it, and move it in the database
        if($request->file('image')){
            $imagePath = $request->file('image');

            $imageName = $pagina->id . '_' . $pagina->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/paginas/' . $pagina->id, $imageName, 'public');
            $pagina->image = $path;
            $pagina->save();
        }
        $pagina->image        = $request->image;

        return redirect('admin/paginas')->with('status', 'Item created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paginas  $paginas
     * @return \Illuminate\Http\Response
     */
    public function show(Pagina $pagina)
    {
        return view('admin.pages.paginas.show', ['paginas' => $pagina]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paginas  $paginas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagina $pagina)
    {
        return view('admin.pages.paginas.edit', ['pagina' => $pagina]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paginas  $paginas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagina $pagina)
    {
        $pagina->update($request->all());
        $pagina = Pagina::find($pagina->id);
        $pagina->title        = $request->title;
        $pagina->description  = $request->description;
        $pagina->save();


        if($request->hasfile('image')){
            Storage::deleteDirectory('public/images/paginas/' . $pagina->id);
            $imagePath = $request->file('image');
           // $imageName = $paginas->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
           $imageName = $pagina->id . '_' . $pagina->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
           $path = $request->file('image')->storeAs('images/paginas/' . $pagina->id, $imageName, 'public');


            $pagina->image = $path;
            $pagina->save();
        }
        return redirect('admin/paginas')->with('status', 'Item edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paginas  $paginas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagina $pagina)
    {
        Storage::deleteDirectory('public/images/paginas/' . $pagina->id);
        $pagina->delete();

        return redirect('admin/paginas')->with('status', 'Item deleted successfully');
    }
}

