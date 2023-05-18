<?php

namespace App\Http\Livewire;

use App\Models\Year;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;


class CreateYear extends Component
{

    public $open=false;
    public $year;
    

    protected $rules=[
        'year'=>'required|max:2100|numeric|unique:years',      

    ];

    public function save()
    {
        $this->validate();
        Storage::makeDirectory($this->year);
        Year::create([
            'year'=>$this->year,
            'path'=>$this->year,
        ]);
        $this->reset(['open', 'year']);
        $this->emitTo('show-year','render');
        $this->emit('alert','Año creado correctamente');
    }


    public function render()
    {
        return view('livewire.create-year');
    }
}
