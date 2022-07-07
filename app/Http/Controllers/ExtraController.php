<?php

namespace App\Http\Controllers;

use App\Extra;
use App\Helpers\Utilities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExtraController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $extras =Extra::orderBy('order', 'asc')->paginate(10);
        return view('admin.pages.extras.index', ['extras' => $extras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extras =Extra::orderBy('order', 'asc')->get();
        return view('admin.pages.extras.create', ['extras' => $extras]);
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
            'name'        => 'required',
            'order'        => 'required',
            'price'        => 'required'
        ]);

        try{
            // verify if order exist and update
            $orderExist = Extra::where('order',$request->order)->first();

            if($orderExist){

                $pack = $orderExist;
                $newOrder = Extra::count()+1;
                $pack->update(['order' => $newOrder]);
            }

            $extra                    = new Extra();
            $extra->name              = $request->name;
            $extra->description       = $request->description;
            $extra->order             = $request->order;
            $extra->price             = $request->price;
            $extra->price_description = $request->price_description;
            $extra->is_active    = $request->has('is_active');
            $extra->save();

            return redirect()->route('extras.index')->with('status', 'Extra criado com sucesso!');
        }catch (\Exception $exception){
            return redirect()->route('extras.create')->with('failed', 'Ocorreu um erro! Tente Novamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function show(Extra $extra)
    {
        return view('admin.pages.extras.show', ['extra' => $extra]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function edit(Extra $extra)
    {
        $extras =Extra::orderBy('order', 'asc')->get();
        return view('admin.pages.extras.edit', ['extra' => $extra, 'extras' => $extras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Extra $extra)
    {
        $this->validate($request, [
            'name'        => 'required',
            'order'        => 'required',
            'price'        => 'required'
        ]);

        try {

            // verify if order change and if exist and update
            Utilities::verifyOrder($request->order,$request->lastOrder, $fieldName = 'order',$tableName = 'extras');

            $extra->update($request->except('is_active'));

            $extra->is_active    = $request->has('is_active');
            $extra->description  = $request->description;
            $extra->save();


            return redirect()->route('extras.index')->with('status', 'Extra atualizado com sucesso!');
        }catch (\Exception $exception){
            return redirect()->route('extra.edit',[$extra->id])->with('failed', 'Ocorreu um erro! Tente Novamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Extra $extra)
    {
        $extra->delete();
        $extras = Extra::orderBy('order', 'asc')->get();

        $count=0;
        foreach ($extras as $extraU){

            if($extraU->order -1  != $count){

                $extraU->order = $count+1;
                $extraU->save();

            }
            $count++;
        }

        return redirect()->route('extras.index')->with('status', 'Extra eliminado com sucesso!');
    }
    public function updateState(Request $request ,Extra $extra)
    {
        $extra->is_active    = $request->has('is_active');
        $extra->save();
        return redirect()->route('extras.index')->with('status', 'Estado da publicação atualizado com sucesso!');
    }
}
