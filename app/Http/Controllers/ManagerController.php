<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Year;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(){
      
        $year=Year::all();
        return view('manager.index', compact('year'));
    }

    public function showarticle($id){
        $article = Article::where('year_id', $id)
                    ->get();
        return view('manager.show', compact('article'));
    }
}
