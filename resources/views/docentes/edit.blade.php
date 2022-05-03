@extends('layouts.app')

@section('titulo', 'Editar Docente')

@section('contenido')

    <h3 class='text-center'>Modificación de docente</h3>
    <form action="/docentes/{{$docente->id}}" method="POST" enctype="multipart/form-data">

        @csrf {{-- csrf es una protección contra ataques malintencionados --}}
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Ingrese nombre del docente</label>
            <input id="nombre" class="form-control" type="text" name="nombre" value="{{$docente->nombre}}">
        </div>
        <div class="form-group">
            <label for="descrip">Modifique la Descripción</label>
            <input id="descrip" class="form-control" type="text" name="descripcion" value="{{$docente->descripcion}}">
        </div>
        <div class="form-group">
            <label for="imagen">Cargue una imágen para el docente</label>
            <br>
            <input id="imagen" type="file" name="imagen">
        </div>

        <button class="btn btn-dark" type="submit">Actualizar</button>
    </form>

@endsection
