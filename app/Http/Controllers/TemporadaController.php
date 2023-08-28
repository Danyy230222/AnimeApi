<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anime = Anime::all();
        return view('temporada.create', compact('anime'));
    }


    public function crear($id){
        $anime = Anime::findOrFail($id);
        return view('temporada.create', compact('anime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temporada = new Temporada();
        $request ->validate([
            'Nombre'=> 'required',
            'FechaInicio'=> 'required',
            'CantidadCapitulos'=> 'required',
            'anime'=> 'required'
        ]);

        $temporada = Temporada::create([
            'Nombre'=> $request->Nombre,
            'FechaInicio'=> $request->FechaInicio,
            'FechaFin'=>$request->FechaFin,
            'CantidadCapitulos'=> $request->CantidadCapitulos,
            'anime_id'=> $request->anime
        ]);

        return redirect()->route('temporada.show', $temporada->anime_id)->with('success', 'Temporada Creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = Anime::find($id);
        $temporada = $anime->temporadas;
        return view('temporada.index', compact('temporada', 'anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $temporada = Temporada::findOrFail($id);
        $anime = $temporada->anime;
    
        return view('temporada.edit', compact('temporada', 'anime'));
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
        $temporada = Temporada::findOrFail($id);

    $request->validate([
        'Nombre' => 'required',
        'FechaInicio' => 'required',
        'FechaFin' => 'required',
        'CantidadCapitulos' => 'required',
    ]);

    $temporada->update([
        'Nombre' => $request->Nombre,
        'FechaInicio' => $request->FechaInicio,
        'FechaFin' => $request->FechaFin,
        'CantidadCapitulos' => $request->CantidadCapitulos,
    ]);

    return redirect()->route('temporada.show', $temporada->anime_id)
        ->with('success', 'Temporada actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos= Temporada::find($id);
        $anime = Anime::find($id);

        $datos->delete();
        return redirect()->route('anime.show', $anime->id)->with('success','Temporada eliminado correctamente');
    }
}
