<?php

namespace App\Http\Controllers;

use App\Models\Capitulo;
use App\Models\Servidor;
use Illuminate\Http\Request;

class ServidorController extends Controller
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

    public function crear($id){
        $capitulo = Capitulo::findOrFail($id);
        return view('servidor.create', compact('capitulo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $servidor = new Servidor();

        $request ->validate([
            'Nombre'=>'required',
            'Url'=>'required',
            'capitulo'=> 'required'
            

        ]);

        $servidor = Servidor::create([
            'Nombre'=>strtoupper($request->Nombre),
            'Url'=>$request->Url,
            'capitulo_id'=>$request->capitulo
        ]);

        return redirect()->route('servidor.show', $servidor->capitulo_id)->with('success', 'Servidor creado correctamente');

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
        $servidor =  $capitulo->servidor;

       
        
         return view('servidor.index', compact('servidor', 'capitulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servidor = Servidor::findOrFail($id);
        $capitulo = $servidor->capitulo;
        return view('servidor.edit', compact('servidor', 'capitulo'));
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
        $servidor = Servidor::findOrFail($id);

        $request->validate([
            'Nombre' => 'required',
            'Url' => 'required',
        ]);
    
        $servidor->update([
            'Nombre' => strtoupper($request->Nombre),
            'Url' => $request->Url,
        ]);
    
        return redirect()->route('servidor.show', $servidor->capitulo_id)->with('success', 'Servidor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servidor = Servidor::findOrFail($id);
        $capituloId = $servidor->capitulo_id; // Obtener el ID del capítulo antes de eliminar el servidor
    
        $servidor->delete();
    
        return redirect()->route('servidor.show', $capituloId)->with('success', 'Servidor eliminado exitosamente.');
    }
}
