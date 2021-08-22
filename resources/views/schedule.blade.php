@extends('layouts.panel')

@section('content')
<form action="{{url('/schedule')}}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Gestionar Horario</h3>
                </div>
                <div class="col text-right">
                    <button type="submit" class="btn btn-sm btn-success">             
                    Guardar Cambios
                    </button>
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
                        <th scope="col">Dia</th>
                        <th scope="col">Actividad</th>
                        <th scope="col">Seleccion de Horarios</th>
                        {{-- <th scope="col">Turno Tarde</th> --}}
                        
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($days as $key => $day)
                    <tr>
                        <th>{{$day}}</th>
                        <td>
                            <label class="custom-toggle">
                                <input type="checkbox" name="active[]" value="{{$key}}">
                                <span class="custom-toggle-slider rounded-circle"></span>
                              </label>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="time_start[]">
                                        @for ($i=10; $i<=12; $i++)
                                            <option value="{{$i}}:00">{{$i}}:00 am</option>
                                            {{-- <option value="{{$i}}:30">{{$i}}:30 am</option> --}}
                                        @endfor
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="time_end[]">
                                        @for ($i=13; $i<=19; $i++)
                                            <option value="{{$i}}:00">{{$i}}:00 pm</option>
                                            {{-- <option value="{{$i+12}}:30">{{$i}}:30 pm</option> --}}
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</form>


@endsection