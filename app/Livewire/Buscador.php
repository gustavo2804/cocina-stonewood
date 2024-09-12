<?php

namespace App\Livewire;

use App\Models\Ordenes;
use Livewire\Component;
use Livewire\WithPagination;

class Buscador extends Component
{   
  use WithPagination;
    public $buscar = '';

    public $listado;

   
    public function render()
        {
            $listadoParaSumar = [];
            
            if($this->buscar != '')
            {
                $listadoParaSumar = Ordenes::where('usuario','LIKE',"$this->buscar%")->get();
            }
            $listados = Ordenes::where('usuario','LIKE',"$this->buscar%")
            ->paginate(10);

            $this->dispatch('listadoOrdenes',$listadoParaSumar);
        return view('livewire.buscador', ['listados'=>$listados]);
    }
}
