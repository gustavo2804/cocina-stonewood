<?php

namespace App\Livewire;

use App\Models\DetallesOrden;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class Sumador extends Component
{
    #[Reactive]
    public $lista;

    public $total;

    public $buscar;


    public function mount()
    {
     $this->totalArticulo();
    }
    

    public function render()
    {
        
        return view('livewire.sumador');
    }
}
