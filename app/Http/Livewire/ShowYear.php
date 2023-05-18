<?php

namespace App\Http\Livewire;

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
        $year=Year::where('year', 'like', '%' . $this->search . '%')
                    ->orderBy('id')
                    ->paginate(10);
        return view('livewire.show-year', compact('year'));
    }
}
