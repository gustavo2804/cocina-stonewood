<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Usuario;

class BuscarNombre extends Component
{   
    public $usuario;
    
    public $usuarioRetornar ;
    public $cedula = '';

    public $resultado ;
    
    public $nombre;
    
    public function formatearCedula()
    {   
        if(strlen($this->usuario) == 11)
        {
            $primero = substr($this->usuario,0,3);
            $medio = substr($this->usuario,3,7);
            $final = substr($this->usuario,-1,1);
            $this->cedula =$primero."-".$medio."-".$final; 
            return true;
        }

        return false;
    }

    public function render()
    {
        $cedulaCompleta = $this->formatearCedula();

        if($cedulaCompleta)
        {
            $this->resultado = Usuario::where("cedula","=",$this->cedula)->get();

            if(count($this->resultado) == 0)
            {
                $this->resultado = 'No Esta Registrado';
            }
        }
    

        return view('livewire.buscarNombre');
    }
}
