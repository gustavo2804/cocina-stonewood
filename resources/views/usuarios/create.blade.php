<x-layout meta-title="Crear Nuevo usuario">

  <h1>Crear Nuevo usuario</h1>
    <form action="{{ route('usuarios.store')}}" method="POST">
        @csrf
        <br>
        @include('usuarios.form-fields');
        <br>
        <button type="submit">Enviar</button>
        <br>
    </form>
    
    <a href="{{route('usuarios.index')}}">Regresar</a>
</x-layout>