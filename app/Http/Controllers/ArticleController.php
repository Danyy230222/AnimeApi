<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Year;
use Directory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article=Article::all();

        

        return view('article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year=Year::all();
        return view('article.create', compact('year'));
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
            'year_id'=>'required',
        ]);

        $urlauto=Str::slug($request->titulo);
        $directorio= Year::find($request->year_id);
        $dir= $directorio->year.'/'.$urlauto;
        
       

        Storage::makeDirectory($dir);
        Article::create([
            'titulo'=>$request->titulo,
            'path'=>$dir,
            'year_id'=>$request->year_id,
        ]);
        return redirect()->route('article.index')->with('success','Articulo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $year=Year::all();
        return view('article.edit',compact('article','year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->validate($request, [
            'titulo' => 'required',
            // 'path' => 'required',
            'year_id'=>'required',
        ]);

        

        $actualdir= Article::find($article->id);
        $nuevodir=$actualdir->path;
        

        $urlauto=Str::slug($request->titulo);
        $directorio= Year::find($request->year_id);
        $dir= $directorio->year.'/'.$urlauto;
        Storage::move($nuevodir, $dir );


        $article->update([
            'titulo'=>$request->titulo,
            'path'=>$dir,
            'year_id'=>$request->year_id,
        ]);
        return redirect()->route('article.index')->with('success','Articulo modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success','Articulo eliminado correctamente');
    }
}
