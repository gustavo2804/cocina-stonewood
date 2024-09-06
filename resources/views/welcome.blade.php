<x-layout>
    <div class="container">
        <h1>COLMADO LA CONFIANZA</h1>
       
        <form action="{{route('store')}}" method="POST">
            @csrf
            <label >
                Introduzca su Cedula: 
                <input type="text" name="usuario">
            </label>
            <table Class="table">
                <th>Articulo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            
                @foreach ($articulos as $articulo )
                <tr>
                    <td>{{$articulo->nombre_articulo}}</td>
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
            
            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
        
    </div>

</x-layout>    

    
