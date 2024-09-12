<?php

namespace App\Http\Controllers;
use App\Models\Ordenes;
use Illuminate\Http\Request;
use App\Models\Colmado;
use App\Models\DetallesOrden;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DetallesOrdenController extends Controller
{   
    public $total = 0;
    public function index()
    {
        $articulosDisponibles  = Colmado::all();
        

        return view('/welcome',['articulos'=>$articulosDisponibles]);
    }

    public function generarNumeroOrden($cedula)
    {
            $prefijo = substr($cedula,0,-3);
            $numeroOrden = uniqid($prefijo);
            return $numeroOrden;
    }
    
    public function sumarAlTotal($cantidad, $precio)
    {
        $this->total += $cantidad*$precio;
    }

    public function store(Request $requests)
    {
        // dd($requests['articulos']);
        //para ejemplo
        $validar = Validator::make($requests['articulos'],
        [
            '*.articulo_precio' => 'required',
             '*.articulo_id'      => 'required',
             '*.articulo_cantidad' => ['required','integer','min:1'], 
        ]);

        $errores = $validar->errors();

        $validUsers = [];
        foreach ($requests['articulos'] as $index => $user) {
            $userErrors = $errores->get($index . '.*');
            if (empty($userErrors)) {
                $validUsers[] = $user;
            }
        }

      

        if (empty($validUsers)) {
            return redirect('/')
                        ->withErrors($validar)
                        ->withInput();
        }

        $validos = $validUsers;


       $usuarioValido =  $requests->validate(['usuario'=>['required','min:11','exists:usuarios,cedula']]);
      
        $usuario = $usuarioValido['usuario'];
        $numeroOrden =  $this->generarNumeroOrden($usuario);
        
        $ordenCreada = false;

        foreach($validos as $request)
        {
            if($validos > 0 )
            {
                
                
                DB::beginTransaction();
                try {
                    $compra = new  DetallesOrden;
                    $compra->cantidad = $request['articulo_cantidad'];
                    $compra->articulo = $request['articulo_id'];
                    $compra->precio   = $request['articulo_precio'];
                    $compra->numero_orden = $numeroOrden ;
                    $compra->save();
                    

                    $this->sumarAlTotal($request['articulo_cantidad'],$request['articulo_precio']);

                    if(!$ordenCreada)
                    {                        
                        $ordenCreada = true;
                    }
                    DB::commit();
                } catch (\Throwable $th) {
                    DB::rollback();
                    return $th->getMessage();
                }
                }   
        }               
                        if($ordenCreada)
                        {
                            $orden = new Ordenes;
                            $orden->numero_orden = $numeroOrden;
                            $orden->usuario      = $usuario;
                            $orden->total        =  $this->total;
                            $orden->save();
                        }

            
         return to_route('home')->with('status','Articulos comprados Correctamente');
        
        ;

    }
}
