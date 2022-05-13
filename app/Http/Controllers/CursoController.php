<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con el método all() traigo toda la información de la tabla como array
        $cursito = Curso::all();
        // Compact adjunta la información deseada a la vista para poderla usar en la vista
        return view('cursos.index', compact('cursito'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Almacena un nuevo registro creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //implementamos validaciones
            $validacionDatos = $request->validate([
            'nombre' => 'required|max:10',
            'imagen' => 'required|image'
        ]);
        if ($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
        }
        //all() me trae toda la informacion almacenada en $request
        //return $request->all();
        $cursito = new Curso();
        /* A traves de la instancia llamo al campo nombre de la tabla curso y le signo el valor que viene en el request */
        $cursito->nombre = $request->input('nombre');
        $cursito->descripcion = $request->input('descripcion');

        // Validamos si viene un archivo desde el campo equis...
        // Luego en el campo imágen almacenamos el nombre del archivo que se va a guardar en storge/app/public e indicamos una subcarpeta de guardado para ser más ordenados
        if ($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }

        //Le digo que guarde la informaciín anterior con save()
        $cursito->save();
        return 'Curso creado exitosamente';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursito = Curso::find($id);
        return view('cursos.show', compact('cursito'));
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
        $cursito = Curso::where('id',$id)->firstOrFail();
        // return $cursito;
        return view('cursos.edit', compact('cursito'));
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
        $cursito = Curso::find($id);
        /* Rellenar todos los campos del Curso con la info que viene
        en la petición o request */
        // Ésta técnica solo actualizará los textos y números
        //$cursito->fill($request->all());
        // Ahora llenamos todos los campos excepto  el campo imagen
        $cursito->fill($request->except('imagen'));
        if ($request->hasFile('imagen')){
            $cursito->imagen = $request->file('imagen')->store('public/cursos');
        }
        //return $request;
        $cursito->save();
        return 'Curso actualizado correctamente';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cursito = curso::find($id);
        //return $cursito;
        $urlImagenBD = $cursito->imagen;
        //return $urlImagenBD;
        $nombreImagen = str_replace('public/','\storage\\',$urlImagenBD);
        //return $nombreImagen;
        $rutaCompleta = public_path().$nombreImagen;
        //return $rutaCompleta;
        unlink($rutaCompleta);
        $cursito -> delete();
        return 'Eliminado Exitosamente';
    }

    public function nosotros($id)
    {
        return view('cursos.show');
    }
}
