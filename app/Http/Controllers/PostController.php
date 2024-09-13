<?php

namespace App\Http\Controllers;

use App\Models\Colmado;
use Illuminate\Http\Request;
use App\Http\Requests\SaveArticuloRequest;



class PostController extends Controller {

   
    
    public function index()
    {
            $articulosVenta = Colmado::orderBy('precio','desc')->paginate(5);
        
            return view('articulos.index',['posts'=>$articulosVenta]);
    }

    public function show($id)
    {
        $articulo =  Colmado::findOrFail($id);

        return view('articulos.show',['articulo'=>$articulo]);
    }

    public function create()
    {

        return view('articulos.create',['articulo' => new Colmado]);
    }

    public function store(SaveArticuloRequest $request)
    {
    //    $validated =  $request->validate([

    //         'nombre_articulo' => ['required'],
    //         'precio' => ['required','integer','min:1'],
    //         'precio_venta' => ['required','integer','min:1']

    //     ]);
    
   

        Colmado::create($request->validated());

        if($request->hasFile('imagen'))
    {
        $file = $request->file('imagen');
        $urlPath = 'image';
        $filename = time().'-'.$file->getClientOriginalName();
        $imageUpload = $request->file('imagen')->move($urlPath,$filename);
        Colmado::insert(['imagen'=>$urlPath.'/'.$filename]);
    }

        // $colmado->nombre_articulo = $request->input('nombre_articulo');
        // $colmado->precio = $request->input('precio');
        // $colmado->precio_venta = $request->input('precio_venta');
        // $colmado->save();

        // session()->flash('status','Articulo Agregado Correctamente');

        return to_route('articulos.index')->with('status','Articulo Agregado Correctamente');
    }

    public function edit(Colmado $articulo)
    {

        return view('articulos.edit',['articulo' => $articulo]);

    }

    public function update(SaveArticuloRequest $request, Colmado $articulo)
    {

        // $validated = $request->validate([

        //     'nombre_articulo' => ['required'],
        //     'precio' => ['required','integer','min:1'],
        //     'precio_venta' => ['required','integer','min:1']

        // ]);
        if($request->hasFile('imagen'))
        {
            $file = $request->file('imagen');
            $urlPath = 'image';
            $filename = time().'-'.$file->getClientOriginalName();
            $imageUpload = $request->file('imagen')->move($urlPath,$filename);
            $articulo->imagen = $urlPath.'/'.$filename;
        }
        $articulo->update($request->validated());

        // $articulo->nombre_articulo = $request->input('nombre_articulo');
        // $articulo->precio = $request->input('precio');
        // $articulo->precio_venta = $request->input('precio_venta');
        // $articulo->save();

        // session()->flash('status','Articulo actualizado!!');

        return to_route('articulos.show',$articulo)->with('status','Articulo actualizado!!');

    }

    public function destroy(Colmado $articulo){

        $articulo->delete();


        return to_route('articulos.index', $articulo)->with('status','Articulo Eliminado') ;
    }

}