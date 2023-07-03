<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CapituloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function crear($id){
        $temporada = Temporada::findOrFail($id);
        return view('capitulo.create', compact('temporada'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $capitulo = new Capitulo();

        $request ->validate([
            'Nombre'=>'required',
            'Numero'=>'required',
            'Duracion'=>'required',
            'FechaLanzamiento'=>'required',
            'Imagen'=>'required',
            'temporada'=>'required'

        ]);

        $imagesportada=  $request->file('Imagen')->store('ImagenCapitulo');
        $relativePathLogo = Storage::url($imagesportada);

        $capitulo = Capitulo::create([
            'Nombre'=>$request->Nombre,
            'Numero'=>$request->Numero,
            'Duracion'=>$request->Duracion,
            'FechaLanzamiento'=>$request->FechaLanzamiento,
            'Imagen'=>$relativePathLogo,
            'temporada_id'=>$request->temporada
        ]);

        return redirect()->route('capitulo.show', $capitulo->temporada_id)->with('success', 'Capitulo creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temporada = Temporada::find($id);
        $capitulo =  $temporada->capitulos;
        
        return view('capitulo.index', compact('temporada', 'capitulo'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $capitulo = Capitulo::findOrFail($id);
        $temporadaId = $capitulo->temporada_id; // Obtener el ID de la temporada antes de eliminar el capítulo

        $capitulo->delete();
        return redirect()->route('capitulo.show', $temporadaId)->with('success', 'Capitulo eliminado exitosamente.');
        }
    
}
