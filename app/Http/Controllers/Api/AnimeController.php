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
}
