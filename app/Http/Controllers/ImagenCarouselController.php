<?php

namespace App\Http\Controllers;

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
        return view('imagencarousel.create');
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
            // 'ImagenWeb'=> 'required|image',
            // 'ImagenMovil'=> 'required|image',
            // 'carousel_id'=> 'required'
        ]
            
        );

        $images=  $request->file('Logo')->store('Logo');
        $relativePath = Storage::path($images);

        $storagePath = substr($relativePath, strpos($relativePath, '/storage'));

        return $storagePath;
        // return redirect()->route('imagencarousel.index')->with('success', 'Carousel Creado Correctamente');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
