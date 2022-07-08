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
        /* correta
        (new User)->forceFill([
            'name' => 'Their name',
            'email' => 'andreteixeira.csn@gmail.com',
        ])->notify(new ChangePass());*/
        $users =User::orderBy('name', 'asc')->paginate(10);
        return view('admin.pages.users.index', ['users' => $users]);

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
        return view('admin.pages.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.pages.users.edit', ['user' => $user]);
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
        $this->validate($request, [
            'name'                => 'required',
            'email'               => 'required|email',
            'mobile_number'       => 'required|digits:9',
            'address'             => 'required',
            'quote_request_email' => 'required|email'
        ],

            [
                'name.required'                 => 'O nome é de preenchimento obrigatório',
                'email.required'                => 'O email é de preechimento obrigatório',
                'email.email'                   => 'Introduza um email válido',
                'mobile_number.required'        => 'O número de telefone é de preechimento obrigatório',
                'mobile_number.digits'          => 'Introduza um número de telefone válido',
                'address'                       => 'Terá que introduzir uma morada',
                'quote_request_email.required'  => 'O email de recepção de pedidos é de preechimento obrigatório',
                'quote_request_email.email'     => 'Introduza um email válido',
            ]);
        try {
            $user->update($request->all());
            return redirect()->route('users.index')->with('status', 'Pack atualizado com sucesso!');
        }catch (\Exception $exception){
            return redirect()->route('user.edit',[$user->id])->with('failed', 'Ocorreu um erro! Tente Novamente');
        }

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

    public function updateState(Request $request ,User $user)
    {
        $user->quote_request_is_active    = $request->has('quote_request_is_active');
        $user->save();
        return redirect()->route('users.index')->with('status', 'Estado do email atualizado com sucesso!');
    }
}
