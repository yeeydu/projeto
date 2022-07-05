<?php

namespace App\Http\Controllers;

use App\Helpers\Utilities;
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
       //dd(request()->url());
        $packs =Pack::orderBy('order', 'asc')->paginate(10);
        return view('admin.pages.packs.index', ['packs' => $packs]);
    }


    public function create()
    {
        $packs =Pack::orderBy('order', 'asc')->get();
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

        try{
            // verify if order exist and update
            $orderExist = Pack::where('order',$request->order)->first();

            if($orderExist){

                $pack = $orderExist;
                $newOrder = Pack::count()+1;
                $pack->update(['order' => $newOrder]);
            }

            $pack               = new Pack();
            $pack->title        = $request->title;
            $pack->summary      = $request->summary;
            $pack->description  = $request->description;
            $pack->order        = $request->order;
            $pack->price        = $request->price;
            $pack->is_active    = $request->has('is_active');
            $pack->save();

            //If we have an image file, we store it, and move it in the database
            if($request->file('image')){
                $imagePath = $request->file('image');
                $imageName = $pack->id . '_' . $pack->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
                $path = $request->file('image')->storeAs('images/packs/' . $pack->id, $imageName, 'public');
                $pack->image = $path;
                $pack->save();
            }

            return redirect()->route('packs.index')->with('status', 'Pack criado com sucesso!');
        }catch (\Exception $exception){
            return redirect()->route('packs.create')->with('failed', 'Ocorreu um erro! Tente Novamente');
        }


    }


    public function show(Pack $pack)
    {

        return view('admin.pages.packs.show', ['pack' => $pack]);
    }


    public function edit(Pack $pack)
    {
        $packs =Pack::orderBy('order', 'asc')->get();
        return view('admin.pages.packs.edit', ['pack' => $pack, 'packs' => $packs]);
    }



    public function update(Request $request, Pack $pack)
    {

        $this->validate($request, [
            'title'        => 'required',
            'summary'      => 'required',
            'description'  => 'required',
            'order'        => 'required',
            'price'        => 'required',
            'image'        => 'image|mimes:png,jpg,jpeg,svg,gif|max:3000'
        ]);

        try {

            // verify if order change and if exist and update
            Utilities::verifyOrder($request->order,$request->lastOrder, $fieldName = 'order',$tableName = 'packs');

            $pack->update($request->except('image','is_active'));

                $pack->is_active    = $request->has('is_active');
                $pack->save();


            if($request->hasfile('image')){
                Storage::deleteDirectory('public/images/packs/' . $pack->id);
                $imagePath = $request->file('image');
                $imageName = $pack->id . '_' . $pack->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
                $path = $request->file('image')->storeAs('images/packs/' . $pack->id, $imageName, 'public');
                $pack->image = $path;
                $pack->save();
            }
            return redirect()->route('packs.index')->with('status', 'Pack atualizado com sucesso!');
        }catch (\Exception $exception){
            return redirect()->route('pack.edit',[$pack->id])->with('failed', 'Ocorreu um erro! Tente Novamente');
        }

    }


    public function destroy(Pack $pack)
    {
        Storage::deleteDirectory('public/images/packs/' . $pack->id);
        $pack->delete();
        $packs = Pack::orderBy('order', 'asc')->get();

        $count=0;
        foreach ($packs as $packU){

            if($packU->order -1  != $count){

                $packU->order = $count+1;
                $packU->save();

            }
            $count++;
        }

        return redirect()->route('packs.index')->with('status', 'Pack eliminado com sucesso!');
    }

    public function updateState(Request $request ,Pack $pack)
    {
        $pack->is_active    = $request->has('is_active');
        $pack->save();
        return redirect()->route('packs.index')->with('status', 'Estado da publicação atualizado com sucesso!');
    }
}
