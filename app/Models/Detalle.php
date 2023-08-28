<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = ['Emision', 'ProximoCapitulo', 'anime_id'];

    use HasFactory;

    public function Anime()
    {
        return $this->belongsTo(Anime::class);
    }
}
