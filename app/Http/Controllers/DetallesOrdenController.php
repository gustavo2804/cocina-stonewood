<?php

namespace App\Http\Controllers;
use App\Models\Ordenes;
use Illuminate\Http\Request;
use App\Models\Colmado;
use App\Models\DetallesOrden;
use Illuminate\Support\Facades\DB;


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
        // $prueba = [];
        //revisar validacion despues
        // $validator = Validator::make($requests['articulos'],
        // [
        //     'articulo_cantidad' => 'required',
        //     'articulo_precio' => 'required',
        //      'articulo_id'      => 'required'   
        // ])->validate();

        // $validos = $validator; 
        
        $usuario = $requests->usuario;
        $numeroOrden =  $this->generarNumeroOrden($usuario);
        
        $ordenCreada = false;

        foreach($requests['articulos'] as $request)
        {
            if($request['articulo_cantidad'] > 0 )
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
