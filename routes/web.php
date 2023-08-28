<?php

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CapituloController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\DobladoController;
use App\Http\Controllers\FractionController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\ImagenCarouselController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ServidorController;
use App\Http\Controllers\SubtituloController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\YearController;
use App\Models\DetalleAnime;
use App\Models\Temporada;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/year', [YearController::class, 'index'])->name('year.index');

// Route::get('/article', [ArticleController::class, 'index'])->name('article.index');

Route::resource('article', ArticleController::class)->names('article');

Route::resource('fraction', FractionController::class)->names('fraction');

Route::get('/manager',[ManagerController::class, 'index'])->name('manager.index');
Route::get('/manager/{id}',[ManagerController::class, 'showarticle'])->name('manager.showarticle');
Route::resource('/carousel', CarouselController::class);
Route::resource('/imagencarousel', ImagenCarouselController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified', 'restrict.api.users']], function () {
    Route::get('/', function () { return view('dashboard');});
    
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('/genero', GeneroController::class);
    Route::resource('/anime', AnimeController::class);
    Route::resource('/temporada', TemporadaController::class);
    Route::get('/temporada/crear/{id}', [TemporadaController::class, 'crear'])->name('temporada.crear');

    Route::resource('/capitulo', CapituloController::class);
    Route::get('/capitulo/crear/{id}', [CapituloController::class, 'crear'])->name('capitulo.crear');

    Route::resource('/servidor', ServidorController::class);
    Route::get('/servidor/crear/{id}', [ServidorController::class, 'crear'])->name('servidor.crear');
    Route::resource('/subtitulo', SubtituloController::class);
    Route::get('/subtitulo/crear/{id}', [SubtituloController::class, 'crear'])->name('subtitulo.crear');
    Route::resource('/doblado', DobladoController::class);
    Route::get('/doblado/crear/{id}', [DobladoController::class, 'crear'])->name('doblado.crear');

    Route::resource('/detalle', DetalleController::class);
    Route::get('/detalle/crear/{id}', [DetalleController::class, 'crear'])->name('detalle.crear');
    
   
    Route::view('forms', 'forms')->name('forms');
    Route::view('file', 'file')->name('file');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');
});
