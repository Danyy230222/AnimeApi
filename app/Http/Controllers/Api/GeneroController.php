<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function view(){
        
        $Genero = Genero::all();
        $Sinopsis = $Genero;
        return response()->json([
            "status" => "ok",
            "result"=> 
                $Genero
                

        ]);
    }
}
