<?php

namespace App\Http\Controllers;

use App\Fotografia;
use App\Helpers\Utilities;
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
        $fotografias =Fotografia::orderBy('order', 'asc')->get();
        return view('admin.pages.fotografias.create', ['categorias' => $category, 'fotografias' => $fotografias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->category_change_create != null){
            //dd('A');
            $totalCat = Fotografia::where('category_id',$request->category_id)->count();
            $updCat = Category::where('id',$request->category_id)->first();
            $livCat = $updCat->id;
            //dd($a);
            //dd($updCat);
            return redirect('admin/fotografias/create')->withInput()->with('totalCat',$totalCat)->with('updCat',$updCat)->with('livCat',$livCat);

        }else {
            $this->validate($request, [
                'title'        => 'required',
                'description'  => 'required',
                'category_id'  => 'required',
                'image'        => 'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048'
            ]);

            try {
                //dd($request->category_id);
                // verify if order exist and update
                $orderExist = Fotografia::where('category_id', $request->category_id)->where('order', $request->order)->first();

                if ($orderExist) {

                    $pic = $orderExist;
                    $newOrder = Fotografia::where('category_id', $request->category_id)->count() + 1;
                    $pic->update(['order' => $newOrder]);
                }

                $fotografia = new Fotografia();
                $fotografia->title = $request->title;
                $fotografia->description = $request->description;
                $fotografia->category_id = $request->category_id;
                $fotografia->order = $request->order;
                $fotografia->is_active = $request->has('is_active');
                $fotografia->save();

                //If we have an image file, we store it, and move it in the database
                if ($request->file('image')) {
                    $imagePath = $request->file('image');
                    $imageName = $fotografia->id . '_' . $fotografia->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
                    $path = $request->file('image')->storeAs('images/fotografias/' . $fotografia->id, $imageName, 'public');
                    $fotografia->image = $path;
                    $fotografia->save();
                }


                return redirect('admin/fotografias')->with('status', 'Pack criado com sucesso!');
            } catch (\Exception $exception) {
                return redirect('admin/fotografias/create')->with('failed', 'Ocorreu um erro! Tente Novamente');
            }
            }

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
        $fotografias =Fotografia::orderBy('order', 'asc')->get();
        $orderCount = Fotografia::where('category_id',$fotografia->category->id)->count();

        return view('admin.pages.fotografias.edit', [  'fotografia' => $fotografia,
                                                            'categorias' => $category,
                                                            'orderCount' => $orderCount,
                                                            'fotografias' => $fotografias]);
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

        $this->validate($request, [
            'title'        => 'required',
            'description'  => 'required',
            'category_id'  => 'required',
            'image'        => 'image|mimes:png,jpg,jpeg,svg,gif|max:2048'
        ]);
        if($request->category_change != null){
            //dd($request->category_id);
            $totalCat = Fotografia::where('category_id',$request->category_id)->count();
            $updCat = Category::where('id',$request->category_id)->first();
            $livCat = $updCat->id;
            return redirect('admin/fotografias/'.$fotografia->id.'/edit')->withInput()->with('totalCat',$totalCat)->with('updCat',$updCat)->with('livCat',$livCat);

        }else{

        try {
            $orderExist = Fotografia::where('category_id', $request->category_id)->where('order', $request->order)->first();


            if ($orderExist) {

                $orderExist->order = $fotografia->order;

                $orderExist->save();

                $fotografia->update(['order' => $request->order]);

            }


            $fotografia->update($request->except('image','is_active','order'));

            $fotografia->is_active    = $request->has('is_active');
            $fotografia->save();

            if($request->hasfile('image')){
                Storage::deleteDirectory('public/images/fotografias/' . $fotografia->id);
                $imagePath = $request->file('image');
                $imageName = $fotografia->id . '_' . $fotografia->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
                $path = $request->file('image')->storeAs('images/fotografias/' . $fotografia->id, $imageName, 'public');
                $fotografia->image = $path;
                $fotografia->save();
            }


            return redirect('admin/fotografias')->with('status', 'Fotografia atualizada com sucesso!');
        }catch (\Exception $exception){
            return redirect('admin/fotografias/'.$fotografia->id.'/edit')->with('failed', 'Ocorreu um erro! Tente Novamente');
        }
        }

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
       $pics = Fotografia::where('category_id',$fotografia->category_id)->orderBy('order', 'asc')->get();
       $count=0;
       foreach ($pics as $pic){

           if($pic->order -1  != $count){

               $pic->order = $count+1;
               $pic->save();

           }
           $count++;
       }


       return redirect('admin/fotografias')->with('status', 'Item deleted successfully');
    }
    public function updateState(Request $request ,Fotografia $pic)
    {
        $pic->is_active = $request->has('is_active');
        $pic->save();
        return redirect('admin/fotografias')->with('status', 'Estado da publicação atualizado com sucesso!');
    }

    public function picsQuery(Request $request){
        return response()->json(
        Fotografia::where('category_id',$request->category_id)->count()
                );

    }

}
