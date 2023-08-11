<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtitulo extends Model
{
    protected $fillable=['Idioma', 'Url', 'capitulo_id'];
    use HasFactory;

    public function Capitulo()
    {
        return $this->belongsTo(Capitulo::class, 'capitulo_id');
    }
}
