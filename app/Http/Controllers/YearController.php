<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Livewire\Livewire;



class YearController extends Controller
{
    public $open = false;


    public function index(){
        $year=Year::all();

        return view('year.index', compact('year'));
    }
}
