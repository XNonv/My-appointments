<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User; //agregado para usar el modelo User
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::clientes()->paginate(10); //User.php
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => 'required|min:5',
            'email' => 'required|email',
            'address' => 'nullable|min:5',
            'phone' =>  'digits:10'
        ];

        $this->validate($request, $rules);

        //mass assignment
        User::create(
            $request->only('name', 'email', 'address', 'phone')
            + [
                'role' => 'cliente',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'La cliente se ha registrado correctamente';
        return redirect('/clientes')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name' => 'required|min:5',
            'email' => 'required|email',
            'address' => 'nullable|min:5',
            'phone' =>  'digits:10'
        ];

        $this->validate($request, $rules);

        //mass assignment
        $user = User::clientes()->findOrFail($id);
   
        $data =  $request->only('name', 'email', 'address', 'phone');
        $password =$request->input('password');
        
        if($password)
            $data['password'] = bcrypt($password);



        $user->fill($data);
        $user->save(); //UPDATE

        $notification = 'La información del cliente se ha actualizado correctamente';
        return redirect('/clientes')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $cliente)
    {
        $clienteName = $cliente->name;
        $cliente->delete();

        $notification = 'El cliente '.'*'. $clienteName .'*'.' se ha eliminado correctamente';
        return redirect('/clientes')->with(compact('notification')); 
    }
}
