<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenCarousel extends Model
{
    use HasFactory;
    protected $fillable = ['Logo', 'Sinopsis', 'ImagenWeb','ImagenMovil', 'Tipo', 'Year', 'Subtitulado', 'Doblado', 'Titulo', 'carousel_id'];

   //Relacion Uno a muchos inversa
   public function Carousel(){
    return $this->belongsTo(Carousel::class);
}
}
