<x-layout :meta-title="$usuario->nombre">

<h1>{{$usuario->nombre}}</h1>

<p>{{"Nombre: ".$usuario->nombre}}</p>

<p>{{"Cedula: ".$usuario->cedula}}</p>



<a href="{{ route('usuarios.index')}}">Back</a>

</x-layout>