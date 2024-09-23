

        <label >
            Nombre Usuario:
            <input name="nombre" type="text" value="{{old('nombre',$usuario->nombre)}}">

            @error('nombre')
                <br>
                <div style="color:red">{{$message}} </div>
            @enderror
        </label>
        <br>
        <label >
            Numero Cedula:
            <input name="cedula" type="text" value="{{old('cedula',$usuario->cedula)}}">
            @error('cedula')
                <br>
                <div style="color:red">{{$message}} </div>
            @enderror
            <br>
            SOLO NUMEROS
        </label>
        <br>
        