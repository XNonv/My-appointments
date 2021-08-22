@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nuevo Cliente</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url ('clientes')}}" class="btn btn-sm btn-default">             
                Cancelar y volver
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
    @endif
    

    <form action="{{ url('clientes/'.$cliente->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form group">
            <label for="name">Nombre del Medico</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $cliente->name)}}" required>
        </div>

        <div class="form group">
            <label for="email">Correo</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', $cliente->email)}}">
        </div>

        <div class="form group">
            <label for="address">Direccion</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $cliente->address)}}">
        </div>

        <div class="form group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $cliente->phone)}}">
        </div>

        <div class="form group">
            <label for="password">Contraseña </label>
            <input type="text" name="password" class="form-control" value="">
            <p>Ingrese un valor sólo si desea modificar la contraseña</p>
        </div>

        <button type="submit" class="mt-3 btn btn-primary" >Guardar</button>
    </form>
    </div>
</div>
@endsection