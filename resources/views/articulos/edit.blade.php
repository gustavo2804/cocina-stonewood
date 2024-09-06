<x-layout meta-title="Formulario Edicion">

    <h1>Formulario de Edicion</h1>
    <form action="{{ route('articulos.update',$articulo)}}" method="POST">
        @csrf @method('PATCH')
        <br>
        @include('articulos.form-fields');
        <br>
        <button type="submit">Enviar</button>
        <br>
    </form>
    
    
    <a href="{{ route('articulos.index')}}">Back</a>
    
    </x-layout>