<?php

namespace App\Http\Controllers;

use App\CustomPrice;
use Illuminate\Http\Request;

class CustomPriceController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.pages.custom-price.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomPrice  $customPrice
     * @return \Illuminate\Http\Response
     */
    public function show(CustomPrice $customPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomPrice  $customPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomPrice $customPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomPrice  $customPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomPrice $customPrice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomPrice  $customPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomPrice $customPrice)
    {
        //
    }
}
