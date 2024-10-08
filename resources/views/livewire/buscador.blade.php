<div>
    <x-layout>
    
        <h1>Pedidos por Usuario</h1>
        <hr>
        <div class="mt-5">
             <input type="text" placeholder="Buscar..." class="form-control"
             wire:model.live = "buscar">   
                    
        </div>
        <div class="mt-5">
                <table class="table">
                    <th>Usuario</th>
                    <th>Numero Orden</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    @foreach ($listados as $lista)
                 
                        <tr>
                            <td>{{$lista->usuario}}</td>
                            <td>{{$lista->numero_orden}}</td>
                            <td>{{$lista->created_at}}</td>
                            <td>  
                                {{$lista->total.' Pesos'}}
                            </td>
                        </tr>
                   
                    @endforeach
                </table>
                <br>
                <div>
                    <h5>Total de pedidos en Pesos: </h5>
                    @livewire('SumadorTotales')
                </div>
                <div>
                    <form wire:submit="descontado">
                        <input type="text" wire:model="cedula">
                     
                        <button type="submit" class="btn btn-primary">Descontar</button>
                    </form>
                </div>
                <br>
                {{$listados->links()}}
         </div>    


    </x-layout>   
</div>
