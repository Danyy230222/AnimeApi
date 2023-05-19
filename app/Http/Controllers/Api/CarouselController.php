<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImagenCarousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function view(){
        
        $carouselprincipal = ImagenCarousel::all();
        $Sinopsis = $carouselprincipal;
        return response()->json([
            "status" => "ok",
            "result"=> 
                $carouselprincipal
                

        ]);
    }
}
