<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con el método all() traigo toda la información de la tabla como array
        $docente = Docente::all();
        // Compact adjunta la información deseada a la vista para poderla usar en la vista
        return view('docentes.index', compact('docente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //all() me trae toda la informacion almacenada en $request
        $docente = new Docente();
        /* A traves de la instancia llamo al campo nombre de la tabla curso y le signo el valor que viene en el request */
        $docente->nombre = $request->input('nombre');
        $docente->edad = $request->input('edad');
        $docente->titulo = $request->input('titulo');

        // Validamos si viene un archivo desde el campo equis...
        // Luego en el campo imágen almacenamos el nombre del archivo que se va a guardar en storge/app/public e indicamos una subcarpeta de guardado para ser más ordenados
        if ($request->hasFile('foto_de_perfil')){
            $docente->foto_de_perfil = $request->file('foto_de_perfil')->store('public/docentes');
        }

        //Le digo que guarde la informaciín anterior con save()
        $docente->save();
        return 'Docente creado exitosamente';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $docente = Docente::find($id);
        return view('docentes.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Con firstOrFail capturo la excepción y muestro el primer
        registro encontrado en la tabla de la BD o lanza un error*/
        $docente = Docente::where('id',$id)->firstOrFail();
        return view('docentes.edit', compact('docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);
        /* Rellenar todos los campos del Curso con la info que viene
        en la petición o request */
        // Ésta técnica solo actualizará los textos y números
        // Ahora llenamos todos los campos excepto  el campo imagen
        $docente->fill($request->except('foto_de_perfil'));
        if ($request->hasFile('foto_de_perfil')){
            $docente->foto_de_perfil = $request->file('foto_de_perfil')->store('public/docentes');
        }
        $docente->save();
        return 'Docente actualizado correctamente';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
