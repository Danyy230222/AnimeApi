<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = ['titulo'];
    
     //Relacion Uno a muchos
     public function ImagenCarousel(){
        return $this->hasMany(ImagenCarousel::class);
    }

}
