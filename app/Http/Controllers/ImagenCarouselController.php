<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\ImagenCarousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class ImagenCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel=ImagenCarousel::all();
        return view('imagencarousel.index', compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carouselid = Carousel::all();
        return view('imagencarousel.create', compact('carouselid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request ->validate([
            'Sinopsis'=> 'required',
            'Logo'=> 'required|image|mimes:jpeg,png,jpg',
             'ImagenWeb'=> 'required|image',
             'ImagenMovil'=> 'required|image',
             'Year'=> 'required',
             'Tipo'=>'required',
             'Subtitulado'=>'required',
             'Doblado'=>'required',
             'carousel_id'=> 'required'
        ]
            
        );

        $imagesLogo=  $request->file('Logo')->store('Logo');
        $relativePathLogo = Storage::url($imagesLogo);
      

        $imagesWeb=  $request->file('ImagenWeb')->store('ImagenWeb');
        $relativePathWeb = Storage::url($imagesWeb);
        

        $imagesMovil=  $request->file('ImagenMovil')->store('ImagenMovil');
        $relativePathMovil = Storage::url($imagesMovil);
       

        ImagenCarousel::create([
            'Sinopsis'=> $request->Sinopsis,
            'Logo'=> $relativePathLogo,
             'ImagenWeb'=> $relativePathWeb,
             'ImagenMovil'=> $relativePathMovil,
             'Year'=> $request->Year,
             'Tipo'=>$request->Tipo,
             'Subtitulado'=>$request->Subtitulado,
             'Doblado'=>$request->Doblado,
             'carousel_id'=> $request->carousel_id
        ]);
         return redirect()->route('imagencarousel.index')->with('success', 'Carousel Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($imagen)
    {
        $datos= ImagenCarousel::find($imagen);

        $imagesLogo=  $datos->Logo;
        $storagePathLogo = substr($imagesLogo, strpos($imagesLogo, 'Logo'));

        $ImagenWeb=  $datos->ImagenWeb;
        $storagePathImagenWeb = substr($ImagenWeb, strpos($ImagenWeb, 'ImagenWeb'));

        $ImagenMovil=  $datos->ImagenMovil;
        $storagePathMovil = substr($ImagenMovil, strpos($ImagenMovil, 'ImagenMovil'));
        

         Storage::delete($storagePathLogo);
         Storage::delete($storagePathImagenWeb);
         Storage::delete($storagePathMovil);
        
         $datos->delete();
         return redirect()->route('imagencarousel.index')->with('success','Articulo eliminado correctamente');
    }
}
