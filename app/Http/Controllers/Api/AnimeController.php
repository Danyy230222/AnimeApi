<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


class AnimeController extends Controller
{
    public function view($id){
        try {
            $anime = Anime::with(['Generos', 'Temporadas' => function ($query) {
                $query->with('Capitulos');
            }])->findOrFail($id);
    
            return response()->json([
                "status" => "ok",
                "result" => $anime
            ]);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                "status" => "error",
                "result" => array(
                    "error_id" => "404",
                    "error_msg" => "No encontrado"
                )
            ], 404);
        }
    }

    public function searchByTitle(Request $request)
{
    $searchTerm = $request->query('search');

    // Verifica si la longitud del término de búsqueda es menor a 3 caracteres
    if (strlen($searchTerm) < 3) {
        return response()->json([
            "status" => "error",
            "result" => array(
                "error_id" => "400",
                "error_msg" => "El término de búsqueda debe tener al menos 3 caracteres."
            )
        ], 400);
    }

    try {
        $animes = Anime::where('Titulo', 'LIKE', '%' . $searchTerm[0] . '%' . $searchTerm[1] . '%' . $searchTerm[2] . '%')
            ->get();

        if ($animes->isEmpty()) {
            return response()->json([
                "status" => "error",
                "result" => array(
                    "error_id" => "404",
                    "error_msg" => "Ups!, Anime no encontrado"
                )
            ], 404);
        }

        return response()->json([
            "status" => "ok",
            "result" => $animes
        ]);
    } catch (ModelNotFoundException $exception) {
        return response()->json([
            "status" => "error",
            "result" => array(
                "error_id" => "500",
                "error_msg" => "Error en el servidor"
            )
        ], 500);
    }
}


}
