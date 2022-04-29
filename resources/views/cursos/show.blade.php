@extends('layouts.app')

@section('titulo', 'Detalle Curso')

@section('contenido')
<div class="text-center">
    <h3>Detalle del Curso</h3>
    <img style="height:180px; width:300px; margin:20px" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
    <p class="card-text text-center">{{$cursito->descripcion}}</p>
    <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-dark">Editar</a>
</div>
<br>
@endsection
