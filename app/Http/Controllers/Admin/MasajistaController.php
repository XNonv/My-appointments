<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;


class MasajistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masajistas = User::masajistas()->get(); //User.php
        return view('masajistas.index', compact('masajistas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masajistas.create');
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
                'role' => 'masajista',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification = 'La masajista se ha registrado correctamente';
        return redirect('/masajistas')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $masajista = User::masajistas()->findOrFail($id);
       return view('masajistas.edit', compact('masajista'));
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
        $user = User::masajistas()->findOrFail($id);
   
        $data =  $request->only('name', 'email', 'address', 'phone');
        $password =$request->input('password');
        
        if($password)
            $data['password'] = bcrypt($password);



        $user->fill($data);
        $user->save();

        $notification = 'La información del masajista se ha actualizado correctamente';
        return redirect('/masajistas')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $masajista)
    {
        $masajistaName = $masajista->name;
        $masajista->delete();

        $notification = 'El masajista '.'*'. $masajistaName .'*'.' se ha eliminado correctamente';
        return redirect('/masajistas')->with(compact('notification')); 
    }
}
