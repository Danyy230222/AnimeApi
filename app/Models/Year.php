<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    use HasFactory;

    protected $fillable=['year', 'path'];

    //Relacion Uno a muchos
    public function article(){
        return $this->hasMany(Article::class);
    }
}
