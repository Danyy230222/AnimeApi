<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;
    
    protected $fillable = ['Nombre', 'FechaInicio', 'FechaFin', 'CantidadCapitulos', 'anime_id'];


    public function Anime()
    {
        return $this->belongsTo(Anime::class);
    }

}
