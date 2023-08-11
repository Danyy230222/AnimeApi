<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capitulo;
use App\Models\Doblado;

class DobladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'Idioma'=>'required',
            'Url'=>'required',
            'capitulo'=> 'required'
            

        ]);

        $doblado = Doblado::create([
            'Idioma'=>strtoupper($request->Idioma),
            'Url'=>$request->Url,
            'capitulo_id'=>$request->capitulo
        ]);

        return redirect()->route('doblado.show', $doblado->capitulo_id)->with('success', 'Audio Doblado creado correctamente');
    }

    public function crear($id){
        $capitulo = Capitulo::findOrFail($id);
        return view('doblado.create', compact('capitulo'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $capitulo = Capitulo::find($id);
        $doblado =  $capitulo->Doblado;

       
        
         return view('doblado.index', compact('doblado', 'capitulo'));
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
