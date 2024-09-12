<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class TotalProductos extends Component
{

    public $articulos;

    public $total;
    #[On('articuloAgregado')]
    public function sumarTotal($precio)
    {

        $this->total += $precio;

    }

    #[On('articuloEliminado')]
    public function restarTotal($precio)
    {
        $this->total -= $precio;
    }

    public function render()
    {
        return view('livewire.total-productos');
    }
}
