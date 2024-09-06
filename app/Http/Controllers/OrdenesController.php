<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;


class OrdenesController extends Controller
{

    public $buscar ;


    public function index()
    {
        
        if($this->buscar)
        {
            $listado = Ordenes::where('usuario','LIKE','%'.$this->buscar.'%')->get();
        }
        else
        {
            $listado = Ordenes::orderBy('created_at','ASC')->paginate(2);
        }
          
            return view('/contact',['listado'=>$listado]);
    }
}
