<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
        $testimonial = Testimonial::orderBy('id', 'asc')->paginate(10);
        return view('admin.pages.testimonials.index', ['testimonials' => $testimonial]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        return view('admin.pages.testimonials.create' );
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
            'description'  => 'required',
        
        ]);

        $testimonial               = new Testimonial();
        $testimonial->name        = $request->name;
        $testimonial->description  = $request->description;
        $testimonial->save();

        return redirect('admin/testimonials')->with('status', 'Item created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.pages.testimonials.show', ['testimonial' => $testimonial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.pages.testimonials.edit', ['testimonial' => $testimonial ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->update($request->all());
        $testimonial = Testimonial::find($testimonial->id);
        $testimonial->name        = $request->name;
        $testimonial->description  = $request->description;
        $testimonial->save();

        return redirect('admin/testimonials')->with('status', 'Item edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect('admin/testimonials')->with('status', 'Item deleted successfully');
    }

    public function updateState(Request $request ,Testimonial $testimonial)
    {
       //dd($testimonial);

        $testimonial->is_active    = $request->has('is_active');
        $testimonial->save();

        return redirect('admin/testimonials')->with('status', 'Estado da publicação atualizado com sucesso!');
    }


}
