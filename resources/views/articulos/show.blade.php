<x-layout :meta-title="$articulo->nombre_articulo">

<h1>{{$articulo->nombre_articulo}}</h1>

<p>{{"Precio Compra: ".$articulo->precio}}</p>

<p>{{"Precio Venta: ".$articulo->precio_venta}}</p>



<a href="{{ route('articulos.index')}}">Back</a>

</x-layout>