<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Colmado;

class Contador extends Component
{

    public $count = 0;
    public $articulo = 0;

    public $cantidad = 0;

    public $precio = 0;

    public $id;


  
    public function mount()
    {
        $compra = Colmado::find($this->id);
        $this->precio = $compra->precio_venta;



    }
    public function aumentar()
    {
        if($this->count >= 0)
        {
            $this->count++;
        }

        
    }

    public function disminuir()
    {
        if($this->count > 0)
        {
            $this->count--;
        } 
    }


    public function render()
    {
        return view('livewire.contador');
    }
}
