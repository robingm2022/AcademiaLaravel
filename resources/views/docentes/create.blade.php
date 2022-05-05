{{-- En blade heredamos con @extends --}}

@extends('layouts.app')

@section('titulo', 'Crear Docente')

@section('contenido')

    <h3 class='text-center'>Creación de nuevo docente</h3>
    <form action="/docentes" method="POST" enctype="multipart/form-data">
        {{-- csrf es una protección contra ataques malintencionados --}}
        @csrf
        <div class="form-group">
            <label for="nombre">Ingresa nombre del docente</label>
            <input id="nombre" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
            <label for="edad">Ingresa la edad</label>
            <input id="edad" class="form-control" type="text" name="edad">
        </div>
        <div class="form-group">
            <label for="titulo">Ingresa el título</label>
            <input id="titulo" class="form-control" type="text" name="titulo">
        </div>
        <div class="form-group">
            <label for="foto_de_perfil">Carga la foto de perfil para el docente</label>
            <br>
            <input id="foto_de_perfil" type="file" name="foto_de_perfil">
        </div>
        <button class="btn btn-dark" type="submit">Crear</button>
    </form>

@endsection
