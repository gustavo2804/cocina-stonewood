<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use League\Flysystem\MountManager;

class usuarioController extends Controller
{
    public $cedula;

    public function mount(Request $cedula)
    {
        $this->cedula = $cedula->input('usuario');
    }
    public function formatCedula()
    {
        return $this->cedula;
    }
    public function buscarUsuario()
    {
       $cedulaFormateada =  $this->formatCedula();

        Usuario::where('cedula','=',$cedulaFormateada);
    }
}
