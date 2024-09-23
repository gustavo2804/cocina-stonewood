<x-layout meta-title="Formulario Edicion">

    <h1>Formulario de Edicion</h1>
    <form action="{{ route('usuarios.update',$usuario)}}" method="POST" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <br>
        @include('usuarios.form-fields');
        <br>
        <button type="submit">Enviar</button>
        <br>
    </form>
    
    
    <a href="{{ route('usuarios.index')}}">Back</a>
    
    </x-layout>