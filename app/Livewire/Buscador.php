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

    public $cedula;

   public function descontado()
   {
    Ordenes::where('usuario', $this->cedula)
    ->update(['descontado' => 1]);

    return to_route('contact')->with('status','Dinero Descontado!!');
   }


    public function render()
        {
            $listadoParaSumar = [];

            if($this->buscar != '')
            {
                $listadoParaSumar = Ordenes::where('usuario','LIKE',"$this->buscar%")->whereNull('descontado')->get();
            }
            $listados = Ordenes::where('usuario','LIKE',"$this->buscar%")->whereNull('descontado')
            ->paginate(10);

            $this->dispatch('listadoOrdenes',$listadoParaSumar);
        return view('livewire.buscador', ['listados'=>$listados]);
    }
}
