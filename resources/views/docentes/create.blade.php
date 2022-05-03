{{-- En blade heredamos con @extends --}}

@extends('layouts.app')

@section('titulo', 'Crear Docente')

@section('contenido')

    <h3 class='text-center'>Creación de nuevo Docente</h3>
    <form action="/docentes" method="POST" enctype="multipart/form-data">
        {{-- csrf es una protección contra ataques malintencionados --}}
        @csrf
        <div class="form-group">
            <label for="nombre">Ingrese nombre del docente</label>
            <input id="nombre" class="form-control" type="text" name="nombre">
        </div>
        <div class="form-group">
            <label for="descrip">Ingrese una Descripción</label>
            <input id="descrip" class="form-control" type="text" name="descripcion">
        </div>
        <div class="form-group">
            <label for="imagen">Cargue una imagen para el docente</label>
            <br>
            <input id="imagen" type="file" name="imagen">
        </div>
        <button class="btn btn-dark" type="submit">Crear</button>
    </form>

@endsection
