@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Ingresar Masajes</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url ('specialties')}}" class="btn btn-sm btn-default">             
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

    <form action="{{ url('specialties')}}" method="post">
        @csrf
        <div class="form group">
            <label for="name">Nombre del masaje</label>
            <input type="text" name="name" class="form-control" value="{{ old('name')}}" required>
        </div>

        <div class="form group">
            <label for="name">Descripción</label>
            <input type="text" name="description" class="form-control" value="{{ old('description')}}">
        </div>

        <button type="submit" class="mt-3 btn btn-primary" >Guardar</button>
    </form>
    </div>
</div>
@endsection