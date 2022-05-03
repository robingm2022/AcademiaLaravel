@extends('layouts.app')

@section('titulo', 'Detalle Docente')

@section('contenido')

    <div class="text-center">
        <h3>Detalle del docente</h3>
        <img style="height:180px; width:300px; margin:20px" src="{{ Storage::url($docente->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
        <p class="card-text text-center">{{$docente->descripcion}}</p>
        <a href="/docentes/{{$docente->id}}/edit" class="btn btn-dark">Editar</a>
    </div>
    <br>

@endsection
