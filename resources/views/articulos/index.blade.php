
    <x-layout>
        
        
    <div class="container">
        
        <h1>Articulos</h1>

        

        <a href="{{ route('articulos.create') }}" class="btn btn-primary">Agregar Nuevo Articulo</a>


        <table class="table">
            <th>Articulo</th>
            <th>Acciones</th>
       
        @foreach ($posts as $post)

            <tr>
                <td>
                    <a href="{{route('articulos.show',$post->id)}}">
                        {{$post->nombre_articulo}}
                    </a>
                </td> 
                
                <td >
                    <div class="row">
                        <div class="col">
                            <a href="{{route('articulos.edit',$post)}}" class="btn btn-info">Editar</a>    
                        </div>
                        <div class="col">
                            <form action="{{ route('articulos.destroy',$post)}}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>    
                
            </div>
            @endforeach
        </table>   
            {{-- paginacion --}}
            {{$posts->links()}}
            
    </div>
    </x-layout>    