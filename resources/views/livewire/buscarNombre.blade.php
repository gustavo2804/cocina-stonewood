<div>
    <input type="text" placeholder="Cedula..." class="form-control"
    wire:model.live = "usuario">
    <br>
    @if ($resultado != '')
        @if ($resultado != 'No Esta Registrado')
        {{$resultado[0]->nombre}}   
        <input type="text" 
        value="{{$cedula}} "
        name ="usuario" hidden>     
        @else
        {{$resultado}}
        @endif
        
    @endif

</div>
