<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;



class SumadorTotales extends Component
{
    public $valoresSumar=[];
    public $totalFinal = 0;
    
    #[On('listadoOrdenes')]
    public function mount($listadoParaSumar = [])
    {
        $this->totalFinal = 0;
        $this->valoresSumar = [];
        if($listadoParaSumar != [])
        {
            $this->valoresSumar = $listadoParaSumar;
        }
    }
    public function sumarTotales($listados = null)
    {
       $this->totalFinal = 0;

        if($listados != null)
        {
            foreach($listados as $listado)
            {
                $this->totalFinal += $listado['total'];
            }
        }

       
    }
    public function render()
    {   
         $this->sumarTotales($this->valoresSumar);

        return view('livewire.sumador-totales');
    }
}
