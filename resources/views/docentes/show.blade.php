@extends('layouts.app')

@section('titulo', 'Detalle Docente')

@section('contenido')

    <div class="text-center">
        <h3>Detalle del docente</h3>
        <img style="height:180px; width:300px; margin:20px" src="{{ Storage::url($docente->foto_de_perfil) }}" class="card-img-top mx-auto d-block" alt="...">
        <p class="card-text text-center">{{$docente->nombre}}</p>
        <p class="card-text text-center">{{$docente->edad}}</p>
        <p class="card-text text-center">{{$docente->titulo}}</p>
        <a href="/docentes/{{$docente->id}}/edit" class="btn btn-dark">Editar</a>
    </div>
    <br>

@endsection
