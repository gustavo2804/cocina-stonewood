
    <x-layout>
        
        
    <div class="container">
        
        <h1>usuarios</h1>

        

        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Agregar Nuevo usuario</a>


        <table class="table">
            <th>Usuarios</th>
            <th>Acciones</th>
       
        @foreach ($usuarios as $usuario)

            <tr>
                <td>
                    <a href="{{route('usuarios.show',$usuario->id)}}">
                        {{$usuario->nombre}}
                    </a>
                </td> 
                
                <td >
                    <div class="row">
                        <div class="col">
                            <a href="{{route('usuarios.edit',$usuario)}}" class="btn btn-info">Editar</a>    
                        </div>
                        <div class="col">
                            <form action="{{ route('usuarios.destroy',$usuario)}}" class="elimnar-usuario" name="prueba" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>    
                
            </div>
            @endforeach
        </table>   
            {{-- paginacion --}}
            {{$usuarios->links()}}

           
            
    </div>
    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
     
            
    </script>
    
    @endsection
      

    </x-layout>    