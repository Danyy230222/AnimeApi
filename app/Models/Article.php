<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'path' , 'year_id'];

    //Relacion Uno a muchos inversa
    public function year(){
       return $this->belongsTo(Year::class);
   }

    //Relacion Uno a muchos
     public function fraction(){
       return $this->hasMany(Fraction::class);
    }
}
