<div>
    <h3>Cantidad: {{$count}}</h3>
    
    <button class="btn btn-danger" wire:click.prevent="disminuir">Quitar</button>
    <button class="btn btn-primary" wire:click.prevent="aumentar">Agregar</button>
    <input type="number" 
    value="{{$count}}"
    name ="articulos[{{$id}}][articulo_cantidad]" hidden>
    <input type="text" 
    value="{{$id}}"
    name ="articulos[{{$id}}][articulo_id]" hidden>
    <input type="number" 
    value="{{$precio}}"
    name="articulos[{{$id}}][articulo_precio]"
    hidden>
</div>


                   
                   