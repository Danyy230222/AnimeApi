<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraction extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'path' , 'article_id'];

    //Relacion Uno a muchos inversa
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
