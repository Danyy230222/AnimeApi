<?php

namespace App\Http\Livewire;

use App\Models\Anime;
use App\Models\Year;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class ShowYear extends Component
{
    use WithPagination;
    
    
    public $search;
    protected $listeners =['render'=>'render'];


    

    public function render()
    {
        $anime=Anime::where('Titulo', 'like', '%' . $this->search . '%')
                    ->orWhere('OtrosNombres', 'like', '%' . $this->search . '%')
                    ->orderBy('id')
                    ->paginate(10);
        return view('livewire.show-year', compact('anime'));
    }
}
