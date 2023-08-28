<?php

use App\Http\Controllers\Api\AnimeController;
use App\Http\Controllers\Api\CarouselController;
use App\Http\Controllers\Api\GeneroController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::get('carousel', [CarouselController::class, 'view']);
Route::get('generos', [GeneroController::class, 'view']);
Route::get('anime/{id}', [AnimeController::class, 'view']);
Route::get('generos/{id}', [GeneroController::class, 'listgenero']);
Route::get('search', [AnimeController::class, 'searchByTitle']);

Route::get('anime/{slug}/view/{capituloid}', [AnimeController::class, 'capitulo']);
Route::put('capitulo/{capituloid}', [AnimeController::class,'actualizarCapitulo']);
    Route::get('cap/{id}', [AnimeController::class, 'getCapitulo']);


Route::get('anime/{slug}/comentario/{orden}', [AnimeController::class, 'getAllComentarios']);


Route::group(['middleware' => ["auth:sanctum", 'verified']], function(){
    Route::get('user/profile', [UserController::class, 'userProfile']);
    Route::post('/user/upload-profile-image', [UserController::class, 'uploadProfileImage']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::put('user/update-profile', [UserController::class, 'updateProfile']);
    Route::get('user/lists', [UserController::class, 'getUserLists']);
    Route::post('user/create-list', [UserController::class, 'createList']);
    Route::delete('user/delete-list/{id}',  [UserController::class,'deleteList']);

    Route::post('user/add-anime-to-list', [UserController::class,'AddAnimeToList']);
    Route::get('user/{animeId}/lists', [UserController::class, 'animeEnLista']);
    Route::get('user/lists/{animeId}/{listId}', [UserController::class, 'isAnimeInList']);
    Route::post('user/lists/delete', [UserController::class, 'removeAnimeFromList']);

    Route::post('anime/{slug}/comentarios', [AnimeController::class, 'crearComentario']);
    Route::put('comentario/{id}/like', [AnimeController::class, 'likeComentario']);
    Route::put('comentario/{id}/dislike', [AnimeController::class, 'dislikeComentario']);

    
    

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
