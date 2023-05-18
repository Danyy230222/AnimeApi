<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Fraction;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fraction=Fraction::all();
      
        return view('fraction.index', compact('fraction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article= Article::all();
        $year=Year::all();
        return view('fraction.create', compact('article','year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            // 'path' => 'required',
            'article_id'=>'required',
        ]);

        $urlauto=Str::slug($request->titulo);
        $directorio= Article::find($request->article_id);
        $dir= $directorio->path.'/'.$urlauto;
        Storage::makeDirectory($dir);
        Fraction::create([
            'titulo'=>$request->titulo,
            'path'=>$dir,
            'article_id'=>$request->article_id,
        ]);
        return redirect()->route('fraction.index')->with('success','Fracción creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fraction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($fraction)
    {
        return view('fraction.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fraction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($fraction)
    {
        //
    }
}
