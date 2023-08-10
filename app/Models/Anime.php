<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = ['Titulo','OtrosNombres', 'Slug', 'Tipo', 'Sinopsis', 'YearLanzamiento', 'EstudioAnimacion', 'Subtitulado', 'Doblado', 'Trailer', 'Calificacion', 'Logo', 'PortadaWeb', 'PortadaMovil'];
    use HasFactory;

    public function Generos()
    {
        return $this->belongsToMany(Genero::class, 'anime_genero', 'anime_id', 'genero_id');
    }

    public function Temporadas()
    {
        return $this->hasMany(Temporada::class);
    }

    public function Comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function Listas()
{
    return $this->belongsToMany(Lista::class, 'anime_lista');
}
}
