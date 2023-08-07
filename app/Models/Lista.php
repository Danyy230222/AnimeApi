<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{ 
    protected $fillable = ['Nombre', 'user_id'];
    use HasFactory;

    public function Anime()
{
    return $this->belongsToMany(Anime::class, 'anime_lista', 'lista_id', 'anime_id');
}

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
