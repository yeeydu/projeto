<?php

namespace App\Http\Controllers;

use App\Video;
use App\Category;
use Illuminate\Http\Request;

class VideoController extends Controller
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
        $videos = Video::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.videos.index', ['videos' => $videos]);

        $category = Category::find($videos->category_id);
        return view('admin.pages.video.index',['categorias' => $category]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $videos = Video::orderBy('order', 'asc')->get();
        return view('admin.pages.videos.create', ['categorias' => $category, 'videos' => $videos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        if($request->category_change_vid_create != null){
            //dd('A');
            $totalCat = Video::where('category_id',$request->category_id)->count();
            $updCat = Category::where('id',$request->category_id)->first();
            $livCat = $updCat->id;
            //dd($a);
            //dd($updCat);
            return redirect('admin/videos/create')->withInput()->with('totalCat',$totalCat)->with('updCat',$updCat)->with('livCat',$livCat);

        }else { 
            $this->validate($request, [
            'title'        => 'required',
            'description'  => 'required', 
            'category_id'  => 'required',
            'order'        => 'required',
            'url'          => 'required'
        ]);

         try {
            //dd($request->category_id);
            // verify if order exist and update
            $orderExist = Video::where('category_id', $request->category_id)->where('order', $request->order)->first();

            if ($orderExist) {

                $pic = $orderExist;
                $newOrder = Video::where('category_id', $request->category_id)->count() + 1;
                $pic->update(['order' => $newOrder]);
            }

        $video               = new Video();
        $video->title        = $request->title;
        $video->description  = $request->description; 
        $video->category_id  = $request->category_id;
        $video->order        = $request->order;
        $video->url          = $request->url;
        $video->save();
        
        /* if necessary photo
        if($request->file('image')){      
            $imagePath = $request->file('image');
            $imageName = $video->id . '_' . $video->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();       
            $path = $request->file('image')->storeAs('images/videos/' . $video->id, $imageName, 'public');
            $video->image = $path;
            $video->save();
        }
        $video->image        = $request->image;
        */
        $video = Video::all();
        return redirect('admin/videos')->with('status', 'Item created succesfully!');
    } catch (\Exception $exception) {
        return redirect('admin/videos/create')->with('failed', 'Ocorreu um erro! Tente Novamente');
    }
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
       return view('admin.pages.videos.show', ['video' => $video]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $category = Category::all();
        $videos =Video::orderBy('order', 'asc')->get();
        $orderCount = Video::where('category_id',$video->category->id)->count();
    
        return view('admin.pages.videos.edit', ['video' => $video, 'categorias' => $category,  'orderCount' => $orderCount, 'videos' => $videos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        
        $this->validate($request, [
            'title'        => 'required',
            'description'  => 'required',
            'category_id'  => 'required',
            'url'          => 'required',
        ]);
        if($request->category_change != null){
            //dd($request->category_id);
            $totalCat = Video::where('category_id',$request->category_id)->count();
            $updCat = Category::where('id',$request->category_id)->first();
            $livCat = $updCat->id;
            return redirect('admin/videos/'.$video->id.'/edit')->withInput()->with('totalCat',$totalCat)->with('updCat',$updCat)->with('livCat',$livCat);

        }else{

            try {
                $orderExist = Video::where('category_id', $request->category_id)->where('order', $request->order)->first();


                if ($orderExist) {
                    $orderExist->order = $video->order;
                    $orderExist->save();
                    $video->update(['order' => $request->order]);
                }


                $video->update($request->except('is_active','order'));
                $video->is_active    = $request->has('is_active');
                $video->save();

                return redirect('admin/videos')->with('status', 'Video atualizado com sucesso!');

            }catch (\Exception $exception){

                return redirect('admin/videos/'.$video->id.'/edit')->with('failed', 'Ocorreu um erro! Tente Novamente');
            }
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //Storage::deleteDirectory('public/images/videos/' . $video->id);
        $video->delete();
        $pics = Video::where('category_id',$video->category_id)->orderBy('order', 'asc')->get();
       $count=0;
       foreach ($pics as $pic){

           if($pic->order -1  != $count){

               $pic->order = $count+1;
               $pic->save();

           }
           $count++;
       }


 
        return redirect('admin/videos')->with('status', 'Item deleted successfully');
    }

    public function updateState(Request $request ,Video $video)
    {
        $video->is_active = $request->has('is_active');
        $video->save();
        return redirect('admin/videos')->with('status', 'Estado da publicação atualizado com sucesso!');
    }

    public function videoQuery(Request $request){
        return response()->json(
        Video::where('category_id',$request->category_id)->count()
                );

    }

}
