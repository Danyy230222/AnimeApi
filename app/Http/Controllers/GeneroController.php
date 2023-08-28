<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genero=Genero::paginate(10);
        return view('genero.index', compact('genero'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Nombre' => 'required',
            'Imagen'=> 'required'
        ]);

        $imagesGenero=  $request->file('Imagen')->store('LogoGenero');
        $relativePathLogo = Storage::url($imagesGenero);

        Genero::create([
            'Nombre'=> $request->Nombre,
            'Imagen'=> $relativePathLogo
        ]);
        return redirect()->route('genero.index')->with('success', 'Genero Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genero = Genero::find($id);
        return view('genero.edit', compact('genero'));
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
        $this->validate($request, [
            'Nombre' => 'required',
        ]);

        $genero = Genero::find($id);

        $genero->Nombre = $request->input('Nombre');

        if ($request->hasFile('Imagen')) {
            $this->validate($request, [
                'Imagen' => 'required'
            ]);

            $imagesGenero = $request->file('Imagen')->store('LogoGenero');
            $relativePathLogo = Storage::url($imagesGenero);
            $genero->Imagen = $relativePathLogo;
        }

        $genero->save();

        return redirect()->route('genero.index')->with('success', 'Genero actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datos= Genero::find($id);

         $datos->delete();
         return redirect()->route('genero.index')->with('success','Genero eliminado correctamente');
    }
}
