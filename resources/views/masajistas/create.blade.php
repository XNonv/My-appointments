@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Nuevo Masajista</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url ('masajistas')}}" class="btn btn-sm btn-default">             
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

    <form action="{{ url('masajistas')}}" method="post">
        @csrf
        <div class="form group">
            <label for="name">Nombre del Medico</label>
            <input type="text" name="name" class="form-control" value="{{ old('name')}}" required>
        </div>

        <div class="form group">
            <label for="email">Correo</label>
            <input type="text" name="email" class="form-control" value="{{ old('email')}}">
        </div>

        <div class="form group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone')}}">
        </div>

        <div class="form group">
            <label for="adress">Direccion</label>
            <input type="text" name="adress" class="form-control" value="{{ old('adress')}}">
        </div>

        <button type="submit" class="mt-3 btn btn-primary" >Guardar</button>
    </form>
    </div>
</div>
@endsection