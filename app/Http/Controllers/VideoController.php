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
        return view('admin.pages.videos.create', ['categorias' => $category]);
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
            'url'          => 'required'
        ]);
        
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
    
        return view('admin.pages.videos.edit', ['video' => $video, 'categorias' => $category]);
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
        
        $video->update($request->all());
        $video = Video::find($video->id);
        $video->title        = $request->title;
        $video->description  = $request->description;
        $video->category_id  = $request->category_id;
        $video->order        = $request->order;
        $video->url        = $request->url;
        $video->save();

       /*
        if($request->hasfile('image')){
            Storage::deleteDirectory('public/images/videos/' . $video->id);
            $imagePath = $request->file('image');
            $imageName = $video->id . '_' . $video->title . '_' . date('Y-m-d') . '_' . $imagePath->getClientOriginalName();
            $path = $request->file('image')->storeAs('images/videos/' . $video->id, $imageName, 'public');
            $video->image = $path;
            $video->save();
        }*/
        return redirect('admin/videos')->with('status', 'Item edited succesfully!');
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
 
        return redirect('admin/videos')->with('status', 'Item deleted successfully');
    }
}
