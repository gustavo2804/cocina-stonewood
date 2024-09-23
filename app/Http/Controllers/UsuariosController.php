<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use League\Flysystem\MountManager;

class UsuariosController extends Controller
{
    public $cedula;

    public $usuario;

    public function mount(Request $cedula)
    {
        $this->usuario = $cedula->input('nombre');
    }
    public function formatearCedula($cedula)
    {   
     
            $primero = substr($cedula,0,3);
            $medio = substr($cedula,3,7);
            $final = substr($cedula,-1,1);
     return $cedulaFormateada =  $primero."-".$medio."-".$final; 

    }


    public function index()
    {
            $usuariosVenta = Usuario::orderBy('nombre','ASC')->paginate(10);
        
            return view('usuarios.index',['usuarios'=>$usuariosVenta]);
    }

    public function show($id)
    {
        $usuario =  Usuario::findOrFail($id);

        return view('usuarios.show',['usuario'=>$usuario]);
    }

    public function create()
    {

        return view('usuarios.create',['usuario' => new Usuario]);
    }

    public function store(Request $request, Usuario $usuario)
    {
    


        $validated = $request->validate([

            'nombre' => ['required', 'min:4'],
            'cedula' => ['required','integer','digits:11'],
            

        ]);
        
        $usuario->nombre = $request->input('nombre');
        $usuario->cedula = $this->formatearCedula($request->input('cedula'));
    
        $usuario->save();


        return to_route('usuarios.index')->with('status','usuario Agregado Correctamente');
    }

    public function edit(Usuario $usuario)
    {

        return view('usuarios.edit',['usuario' => $usuario]);

    }

    public function update(request $request, Usuario $usuario)
    {
        $validated = $request->validate([

            'nombre' => ['required', 'min:4'],
            'cedula' => ['required','integer','digits:11'],
            

        ]);
        
        $usuario->nombre = $request->input('nombre');
        $usuario->cedula = $this->formatearCedula($request->input('cedula'));
    
        $usuario->save();

        return to_route('usuarios.show',$usuario)->with('status','usuario actualizado!!');

    }

    public function destroy(Usuario $usuario){

        $usuario->delete();


        return to_route('usuarios.index', $usuario)->with('status','usuario Eliminado') ;
    }

}
