<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anime=Anime::all();

        

        return view('anime.index', compact('anime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos=Genero::all();
        return view('anime.create', compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anime = new Anime();
        $request ->validate([
            'Titulo'=> 'required',
            'Sinopsis'=> 'required',
             'Tipo'=> 'required',
             'YearLanzamiento'=> 'required',
             'EstudioAnimacion'=> 'required',
             'Subtitulado'=>'required',
             'Doblado'=>'required',
             'Trailer'=>'required',
             'Logo'=> 'required',
             'PortadaWeb'=>'required',
             'PortadaMovil'=>'required',
             'generos'=> 'required'
        ]);

        $slug = Str::slug($request->Titulo, '-');
        $imagesLogo=  $request->file('Logo')->store('Logoanime');
        $relativePathLogo = Storage::url($imagesLogo);
      

        $imagesWeb=  $request->file('PortadaWeb')->store('PortadaWeb');
        $relativePathWeb = Storage::url($imagesWeb);
        

        $imagesMovil=  $request->file('PortadaMovil')->store('PortadaMovil');
        $relativePathMovil = Storage::url($imagesMovil);

        $anime= Anime::create([
            'Titulo'=> $request->Titulo,
            'Slug' => $slug,
            'OtrosNombres'=>$request->OtrosNombres,
            'Sinopsis'=> $request->Sinopsis,
             'Tipo'=> $request->Tipo,
             'YearLanzamiento'=> $request->YearLanzamiento,
             'EstudioAnimacion'=> $request->EstudioAnimacion,
             'Subtitulado'=>$request->Subtitulado,
             'Doblado'=>$request->Doblado,
             'Calificacion'=>$request->Calificacion,
             'Trailer'=>$request->Trailer,
             'Logo'=> $relativePathLogo,
             'PortadaWeb'=>$relativePathWeb,
             'PortadaMovil'=>$relativePathMovil,
             
        ]);
        $generosSeleccionados = $request->input('generos');
        foreach ($generosSeleccionados as $generoId) {
            $anime->Generos()->attach($generoId);
        }
        return redirect()->route('anime.index')->with('success', 'Anime creado exitosamente.');

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
        $anime = Anime::findOrFail($id);

    // Eliminar las relaciones en la tabla anime_genero
    $anime->Generos()->detach();

    // Eliminar el registro de anime
    $anime->delete();

    return redirect()->route('anime.index')->with('success', 'Anime eliminado exitosamente.');
    }
}
