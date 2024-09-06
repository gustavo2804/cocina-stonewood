<?php

namespace App\Livewire;

use App\Models\Ordenes;
use Livewire\Component;

class Buscador extends Component
{   
   
    public $buscar = '';

    public $listado;

   
    public function render()
        {
            $listados  = Ordenes::where('usuario','LIKE',"$this->buscar%")
            ->paginate(10);
            
           
  
        return view('livewire.buscador', compact('listados'));
    }
}
