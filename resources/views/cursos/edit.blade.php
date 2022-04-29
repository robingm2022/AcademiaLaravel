@extends('layouts.app')

@section('titulo', 'Editar Curso')

@section('contenido')

<h3 class='text-center'>Modificación de curso</h3>
<form action="/cursos/{{$cursito->id}}" method="POST" enctype="multipart/form-data">

    @csrf {{-- csrf es una protección contra ataques malintencionados --}}
    @method('PUT')

    <div class="form-group">
        <label for="nombre">Ingrese nombre del curso</label>
        <input id="nombre" class="form-control" type="text" name="nombre" value="{{$cursito->nombre}}">
    </div>
    <div class="form-group">
        <label for="descrip">Modifique la Descripción</label>
        <input id="descrip" class="form-control" type="text" name="descripcion" value="{{$cursito->descripcion}}">
    </div>
    <div class="form-group">
        <label for="imagen">Cargue una imágen para el curso</label>
        <br>
        <input id="imagen" type="file" name="imagen">
    </div>

    <button class="btn btn-dark" type="submit">Actualizar</button>
</form>

@endsection
