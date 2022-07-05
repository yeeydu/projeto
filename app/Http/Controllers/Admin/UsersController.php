<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Notifications\ChangePass;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class UsersController extends Controller
{
    use Notifiable;
    public function  __construct()
    {

    $this->middleware('auth');

    }

    public function index()
    {
        /* -- Teste de Notificação
        $url = url('http://127.0.0.1:8000/admin/precos/update/1');
        (new User)->forceFill([
            'name' => 'Their name',
            'email' => 'andreteixeira.csn@gmail.com',
        ])->notify(new ChangePass($url));*/
        (new User)->forceFill([
            'name' => 'Their name',
            'email' => 'andreteixeira.csn@gmail.com',
        ])->notify(new ChangePass());

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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
