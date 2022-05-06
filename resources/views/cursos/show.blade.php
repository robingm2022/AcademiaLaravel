@extends('layouts.app')

@section('titulo', 'Detalle Curso')

@section('contenido')

    <div class="text-center">
        <h3>Detalle del Curso</h3>
        <img style="height:180px; width:300px; margin:20px" src="{{ Storage::url($cursito->imagen) }}" class="card-img-top mx-auto d-block" alt="...">
        <p class="card-text text-center">{{$cursito->descripcion}}</p>
        <a href="/cursos/{{$cursito->id}}/edit" class="btn btn-dark">Editar</a>
        <br>
        <br>
        {{-- Para éste caso no se necesita escribir destroy en la ruta como sí escribimos
             edit en la ruta para obtener el formulario de edición. Aquí creamos un formulario
             simplemente para poder incluir el botón para eliminar --}}
        <form class="form-group" action="/cursos/{{$cursito->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">--Eliminar--</button>
        </form>
    </div>
    <br>

@endsection
