@extends('layouts.app')

@section('titulo', 'Listado de Docentes')

@section('contenido')

    <br>
    <h3 class="text-center">Aquí encontraras la lista de docentes</h3>
        {{-- Con foreach hago el recorrido del array --}}
        <div class="row">
        @foreach ($docente as $alias)
            <div class="col-sm">
                <br>
                <div class="card text-center" style="width: 18rem; margin-top:20px">
                    <img style="height:150px; width:250px; margin:20px" src="{{ Storage::url($alias->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$alias->nombre}}</h5>
                    <p class="card-text">{{$alias->descripcion}}</p>
                    <a href="/cursos/{{$alias->id}}" class="btn btn-dark">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>

@endsection
