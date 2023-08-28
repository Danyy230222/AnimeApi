<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Anime;
use App\Models\Lista;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Contracts\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;



class UserController extends Controller
{
    public function register(Request $request){
        $request ->validate(([
            'name' => 'required',
            'email'=> 'required|email|unique:users',
            'password' =>'required|confirmed'
        ]));

        $user = new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= Hash::make($request->password);
        $user->origin = 'api';
        $user->save();

        return response()->json([
            "status" => "ok",
            "result" => "Registro Hecho"

        ]);
    }
    public function login(Request $request){
        $request ->validate(([
           
            'email'=> 'required|email',
            'password' =>'required'
        ]));

        $user = User::where("email", "=", $request->email)->first();

        if (isset($user->id)) {
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status" => "ok",
                    "result"=> array(
                        "msg" => "Usuario logueado exitosamente",
                        "token"=> $token
                    )
                    
        
                ]);
            }
            else{
                return response()->json([
                    "status" => "error",
                    "result" => array(
                        "error_id" => "400",
                        "error_msg" => "Contraseña incorrecta"
                    )
        
                ]);
            }
        }else{
            return response()->json([
                "status" => "error",
                "result" => array(
                    "error_id" => "200",
                    "error_msg" => "Correo no registrado"
                )
    
            ], 200);
        }
    }
    public function userProfile(){
        return response()->json([
            "status" => "ok",
            "result" => array(
                "msg" => "Acerca del perfil de usuario",
                "Usuario"=> auth()->user()
            )
            
            

        ]);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            "status" => "ok",
            "result" => array(
                "msg" => "Cierre de sesion exitoso"
                
            )
            

        ]);
    }

    public function uploadProfileImage(Request $request)
    {
        // Validar la solicitud para asegurarse de que contiene una imagen
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Cambia las extensiones y el tamaño según tus necesidades
        ]);
    
        // Obtenemos el usuario autenticado
        $user = auth()->user();
    
        // Eliminar la imagen anterior si existe
        if ($user->profile_photo_path) {
            Storage::delete($user->profile_photo_path);
        }
    
        // Subir la nueva imagen
        $imagePath = $request->file('profile_image')->store('profile_images', 'public');
    
        // Actualizar el campo de ruta de la imagen de perfil en la base de datos
        $user->profile_photo_path = Storage::url($imagePath);
        $user->save();
    
        return response()->json([
            "status" => "ok",
            "result" => array(
                "msg" => "Imagen de perfil subida exitosamente",
                "profile_photo_path" => $user->profile_photo_path
            )
        ]);
    }

    public function updateProfile(Request $request){
        $user = auth()->user(); // Obtener el usuario autenticado

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Ignorar el email del usuario actual
            'password' => 'nullable',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        return response()->json([
            'status' => 'ok',
            'result' => 'Perfil de usuario actualizado exitosamente',
        ]);
    }

    public function getUserLists()
    {
        $user = auth()->user();
        $lists = Lista::where('user_id', $user->id)
        ->with('anime')
        ->get();

        return response()->json([
            'status' => 'ok',
            'result' => $lists,
        ]);
    }

    public function createList(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'Nombre' => 'required',
          
        ]);

        $lista = new Lista();
        $lista->Nombre = $request->input('Nombre');
    
        $lista->user_id = $user->id;
        $lista->save();
         

        return response()->json([
            'status' => 'ok',
            
            'result' => array(
                'mgs'=>'Lista creada exitosamente',
                "Lista" => $lista
                )
        ]);
    }

    public function deleteList($id)
    {
        $user = auth()->user();
        
        // Busca la lista por su ID y verifica si pertenece al usuario autenticado
        $lista = Lista::where('id', $id)
                    ->where('user_id', $user->id)
                    ->first();
        
        if (!$lista) {
            return response()->json([
                'status' => 'error',
                'result' => array(
                    'mgs' => 'Lista no encontrada'
                ),
            ], 404);
        }
        
        // Elimina la lista
        $lista->delete();
        
        return response()->json([
            'status' => 'ok',
            'result' => array(
                'mgs' => 'Lista borrada exitosamente'
            ),
        ]);
    }

    public function AddAnimeToList(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'anime_id' => 'required|exists:animes,id',
            'lista_id' => 'required|exists:listas,id', // Asegúrate de ajustar el nombre de la tabla si es diferente
        ]);

        $animeId = $request->input('anime_id');
        $listaId = $request->input('lista_id');

        // Verificar si el usuario tiene permiso para agregar a esta lista, si es necesario

        $lista = Lista::findOrFail($listaId);
        $anime = Anime::findOrFail($animeId);

        // Verificar si el anime ya está en la lista para evitar duplicados
        if ($lista->Anime()->where('anime_id', $animeId)->exists()) {
            return response()->json([
                'status' => 'error',
                'result'=> array(
                    'mgs' => 'El anime ya está en la lista'
                ),
            ], 400);
        }

        // Adjuntar el anime a la lista utilizando la relación
        $lista->Anime()->attach($anime);

        return response()->json([
            'status' => 'ok',
            'result'=> array(
                'mgs' => 'Anime agregado exitosamente a la lista'
            ),
        ]);
    }
    public function animeEnLista($animeId)
    {
        $user = auth()->user();
        $anime = Anime::findOrFail($animeId);
    
        $lists = $user->Lista()->whereHas('Anime', function ($query) use ($animeId) {
            $query->where('anime_id', $animeId);
        })->get();
    
        return response()->json([
            'status' => 'ok',
            'result' => [
                'listasDelUsuarioConAnime' => $lists,
            ],
        ]);
    }

    public function isAnimeInList($animeId, $listId)
{
    $user = auth()->user();

    $list = Lista::where('user_id', $user->id)
        ->where('id', $listId)
        ->with('anime')
        ->first();

    if ($list) {
        return $list->anime->contains('id', $animeId);
    }

    return false;
}

public function removeAnimeFromList(Request $request)
{
    $animeId = $request->input('anime_id');
    $listaId = $request->input('lista_id');

    $lista = Lista::findOrFail($listaId);
    $lista->anime()->detach($animeId);

    return response()->json([
        'status' => 'ok',
        'result' => array(
            'mgs'=> 'Anime eliminado de su lista',
            'lista'=>$lista
        ),
    ]);
}
    
 

   
}
