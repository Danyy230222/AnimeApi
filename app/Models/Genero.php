<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $fillable = ['Nombre', 'Imagen'];

    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'anime_genero', 'genero_id', 'anime_id');
    }
}
