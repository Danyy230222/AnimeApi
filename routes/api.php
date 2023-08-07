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

Route::get('anime/{animeid}/view/{capituloid}', [AnimeController::class, 'capitulo']);

Route::get('cap/{id}', [AnimeController::class, 'getCapitulo']);
Route::put('capitulo/{capituloid}', [AnimeController::class,'actualizarCapitulo']);



Route::group(['middleware' => ["auth:sanctum", 'verified']], function(){
    Route::get('user/profile', [UserController::class, 'userProfile']);
    Route::post('/user/upload-profile-image', [UserController::class, 'uploadProfileImage']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::put('user/update-profile', [UserController::class, 'updateProfile']);
    Route::get('user/lists', [UserController::class, 'getUserLists']);
    Route::post('user/create-list', [UserController::class, 'createList']);
    

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
