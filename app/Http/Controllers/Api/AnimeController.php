<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Capitulo;
use App\Models\Comentario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AnimeController extends Controller
{
    public function view($slug){
        try {
            $anime = Anime::with(['Generos', 'Temporadas' => function ($query) {
                $query->with(['Capitulos' => function ($query) {
                    $query->with('Servidor');
                }]);
            }, 'Comentarios' => function ($query) {
                $query->with('user')
                ->orderBy('created_at', 'desc'); // Incluir los datos del usuario que hizo el comentario
            }, 'Detalle'])->where('Slug', $slug)->firstOrFail();

          

    
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
        $animes = Anime::where('Titulo', 'LIKE', '%' . $searchTerm . '%' )
        ->orWhere('OtrosNombres', 'LIKE', '%' . $searchTerm . '%')
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

public function capitulo($slug, $capituloid){
    $anime = Anime::where('Slug', $slug)->firstOrFail();
    try {
        $servidor = Capitulo::with(['Servidor', 'Subtitulo', 'Doblado'])->findOrFail($capituloid);
        return response()->json([
            "status" => "ok",
            "result" => $servidor
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

public function actualizarCapitulo(Request $request, $capituloid)
{
    try {
        $capitulo = Capitulo::findOrFail($capituloid);
        
        $capitulo->tiempo_visualizacion = $request->tiempo_visualizacion;

        $capitulo->save();

        return response()->json([
            "status" => "ok",
            "result" => $capitulo
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

public function getCapitulo($id){
    try {
        $capitulo = Capitulo::findOrFail($id);

        return response()->json([
            "status" => "ok",
            "result" => $capitulo
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

public function crearComentario(Request $request, $slug)
{
    try {
        $anime = Anime::where('Slug', $slug)->firstOrFail();
        $user = auth()->user(); // Obtener el usuario autenticado
        
        $data = $request->validate([
            'Comentario' => 'required|string',
            'Calificacion' => 'required|numeric|min:1|max:5',
        ]);

        // Crear el comentario y asociarlo al anime
        $comentario = new Comentario();
        $comentario->Comentario = $data['Comentario']; // Actualiza el nombre del campo según tu esquema
        $comentario->Calificacion = $data['Calificacion']; // Actualiza el nombre del campo según tu esquema
        
        // Asigna las claves foráneas
        $comentario->anime_id = $anime->id;
        $comentario->user_id = $user->id; 

        // Guarda el comentario
        $comentario->save();

        return response()->json([
            "status" => "ok",
            "result" => array(
                "mgs"=> "Comentario creado",
                $comentario)
        ], 201); // Código de respuesta "Created"
    } catch (ModelNotFoundException $exception) {
        return response()->json([
            "status" => "error",
            "result" => array(
                "error_id" => "404",
                "error_msg" => "Anime no encontrado"
            )
        ], 404);
    } catch (ValidationException $validationException) {
        return response()->json([
            "status" => "error",
            "result" => array(
                "error_id" => "422",
                "error_msg" => "Datos de comentario inválidos",
                "errors" => $validationException->errors(),
            )
        ], 422); // Código de respuesta "Unprocessable Entity"
    }
}

public function getAllComentarios($slug, $orden)
{
    try {
        $anime = Anime::where('Slug', $slug)->firstOrFail();
        
        $comentariosQuery = Comentario::where('anime_id', $anime->id);

        if ($orden === 'nuevos') {
            $comentariosQuery->orderBy('created_at', 'desc');
        } elseif ($orden === 'antiguos') {
            $comentariosQuery->orderBy('created_at', 'asc');
        }

        $comentarios = $comentariosQuery->with('user')->get();
        
        return response()->json([
            "status" => "ok",
            "result" => $comentarios
        ]);
    } catch (ModelNotFoundException $exception) {
        return response()->json([
            "status" => "error",
            "result" => array(
                "error_id" => "404",
                "error_msg" => "Anime no encontrado"
            )
        ], 404);
    }
}

public function likeComentario($id)
{
    $comentario = Comentario::findOrFail($id);
    $comentario->increment('Like'); // Incrementa el contador de likes

    return response()->json([
        'status' => 'ok',
        'message' => 'Like actualizado correctamente',
    ]);
}

public function dislikeComentario($id)
{
    $comentario = Comentario::findOrFail($id);
        $comentario->increment('Dislike'); // Incrementa el contador de dislikes

        return response()->json([
            'status' => 'ok',
            'message' => 'Dislike actualizado correctamente',
        ]);
}

}
