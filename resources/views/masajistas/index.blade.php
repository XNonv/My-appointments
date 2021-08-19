@extends('layouts.panel')

@section('content')


<div class="card shadow">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-0">Masajistas</h3>
            </div>
            <div class="col text-right">
                <a href="{{ url ('masajistas/create')}}" class="btn btn-sm btn-success">             
                Nuevo Masajista
                </a>
            </div>
        </div>
    </div>
    <div class="card body">
        @if( session('notification'))
        <div class="alert alert-success" role="alert">
            {{session('notification')}}
        </div>
        @endif()
        
    </div>
    

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">telefono</th>
                    <th scope="col">Opciones</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($masajistas as $masajista)
                <tr>
                    <th scope="row">
                        {{$masajista->name}}
                    </th>
                    <td>
                        {{$masajista->email}}
                    </td>
                    <td>
                        {{$masajista->phone}}
                    </td>
                    <td>
                       
                        <form action="{{ url('/masajistas/'.$masajista->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/masajistas/'.$masajista->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                            <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection