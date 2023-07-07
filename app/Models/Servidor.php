<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    protected $fillable=['Nombre', 'Url', 'capitulo_id'];
    use HasFactory;

    public function Capitulo()
    {
        return $this->belongsTo(Capitulo::class, 'capitulo_id');
    }
}
