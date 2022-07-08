<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
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
        $faq = Faq::orderBy('id', 'asc')->paginate(10);
        return view('admin.pages.faqs.index', ['faqs' => $faq]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.faqs.create' );
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
            'question'    => 'required',
            'answer'      => 'required',
        
        ]);

        $faq               = new Faq();
        $faq->question     = $request->question;
        $faq->answer       = $request->answer;
        $faq->save();

        return redirect('admin/faqs')->with('status', 'Item created succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(faq $faq)
    {
        return view('admin.pages.faqs.show', ['faq' => $faq]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(faq $faq)
    {
        return view('admin.pages.faqs.edit', ['faq' => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, faq $faq)
    {
        $faq->update($request->all());
        $faq = Faq::find($faq->id);
        $faq->question   = $request->question;
        $faq->answer     = $request->answer;
        $faq->save();

        return redirect('admin/faqs')->with('status', 'Item edited succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(faq $faq)
    {
        $faq->delete();

        return redirect('admin/faqs')->with('status', 'Item deleted successfully');
    }

    public function updateState(Request $request ,Faq $faq)
    {
       //dd($testimonial);

        $faq->is_active    = $request->has('is_active');
        $faq->save();

        return redirect('admin/faqs')->with('status', 'Estado da publicação atualizado com sucesso!');
    }

}
