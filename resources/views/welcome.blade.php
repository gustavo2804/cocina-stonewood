<x-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
       
      
        <h1>COLMADO LA CONFIANZA</h1>
        @if ($errors->has('*.articulo_cantidad'))
        <div style="color:red">{{'Debe Seleccionar al menos un articulo.'}} </div>
        @endif
        <form action="{{route('store')}}" method="POST">
            @csrf
            
            <label >
                Introduzca su Cedula: 
                @livewire('buscarNombre')
                <br>
                @error('usuario') <div style="color:red">{{$message}} </div>
                @enderror
            </label>

            <table Class="table">
                <th>Articulo</th>
                <th>Precio</th>
                <th>Cantidad</th>
            
                @foreach ($articulos as $articulo )
                <tr>
                    <td>
                        <img src="{{$articulo->imagen}}" alt="{{$articulo->nombre_articulo}}" class="img-fluid" width="120px">
                        {{$articulo->nombre_articulo}}
                    </td>
                    <td>{{$articulo->precio_venta}}</td>
                    <td>
                        <div id="{{$articulo->id}}">
                            @livewire('Contador',['id'=>$articulo->id])
                        </div>
                        
                    </td>
                    <td>
            
                    </td>
                </tr>
                @endforeach
            </table>
                <div>
                    <h5>Total del pedido: </h5>
                    @livewire('totalProductos')
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Comprar</button>
                </div>
                
        </form >

        
    </div>

    <script>

    </script>

</x-layout>    

    
