<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Genero;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function view(){
        
        $Genero = Genero::all();
        $Sinopsis = $Genero;
        return response()->json([
            "status" => "ok",
            "result"=> 
                $Genero
                

        ]);
    }

    public function listgenero($id)
{
    try {
        $genero = Genero::findOrFail($id);
        $animes = Anime::whereHas('Generos', function ($query) use ($genero) {
            $query->where('genero_id', $genero->id);
        })
        ->whereDoesntHave('Detalle', function ($query) {
            $query->where('Emision', 'Proximamente');
        })
        ->orderBy('YearLanzamiento', 'desc')
        ->get();

        return response()->json([
            "status" => "ok",
            "genero" => $genero, // Agrega el nombre del género
            "result" => $animes
        ]);
    } catch (ModelNotFoundException $e) {
        return response()->json([
            "status" => "error",
            "result" => array(
                "error_id" => "404",
                "error_msg" => "No encontrado"
            )
        ], 404);
    }
}
}
