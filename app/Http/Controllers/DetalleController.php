<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Detalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class DetalleController extends Controller
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
        $anime = Anime::findOrFail($id);
        return view('detalle.create', compact('anime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detalle = new Detalle();
        $request ->validate([
            'Emision'=> 'required',
            
        ]);
        $detalle = Detalle::create([
            'Emision'=> $request->Emision,
            'ProximoCapitulo'=> $request->ProximoCapitulo,
            'anime_id'=> $request->anime
        ]);
        return redirect()->route('detalle.show', $detalle->anime_id)->with('success', 'Temporada Creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = Anime::findOrFail($id); 
        $detalle = $anime->Detalle; 
        
        return view('detalle.index', compact('detalle', 'anime'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalle = Detalle::findOrFail($id); 
        $anime = $detalle->anime; 

        
         
        return view('detalle.edit', compact('anime', 'detalle'));
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
       $detalle = Detalle::findorFail($id);

       $request->validate([
        'Emision'=> 'required'
       ]);

       $detalle->update([
        'Emision'=> $request->Emision,
        'ProximoCapitulo'=> $request->ProximoCapitulo,
        'anime_id'=> $request->anime
       ]);

       return redirect()->route('detalle.show', $detalle->anime_id)->with('success', 'Detalle Actualizado correctamente ' );
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
