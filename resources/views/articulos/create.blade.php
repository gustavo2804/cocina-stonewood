<x-layout meta-title="Crear Nuevo Articulo">

  <h1>Crear Nuevo Articulo</h1>
    <form action="{{ route('articulos.store')}}" method="POST">
        @csrf
        <br>
        @include('articulos.form-fields');
        <br>
        <button type="submit">Enviar</button>
        <br>
    </form>
    
    <a href="{{route('articulos.index')}}">Regresar</a>
</x-layout>