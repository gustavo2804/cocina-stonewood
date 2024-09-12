

        <label >
            Nombre Articulo:
            <input name="nombre_articulo" type="text" value="{{old('nombre_articulo',$articulo->nombre_articulo)}}">

            @error('nombre_articulo')
                <br>
                <div style="color:red">{{$message}} </div>
            @enderror
        </label>
        <br>
        <label >
            Precio Compra Articulo:
            <input name="precio" type="number" value="{{old('precio',$articulo->precio)}}">
            @error('precio')
                <br>
                <div style="color:red">{{$message}} </div>
            @enderror
        </label>
        <br>
        <label >
            Precio Venta Articulo:
            <input name="precio_venta"   type="number" value="{{old('precio_venta',$articulo->precio_venta)}}">
            @error('precio_venta')
                <br>
                <div style="color:red">{{$message}} </div>
            @enderror
        </label>
        <br>
        <label>
            Imagen del Articulo:
            <div>
                <img src="{{$articulo->imagen}}" alt="{{$articulo->nombre_articulo}}" class="img-fluid" width="120px">
            </div>
        </label>
        <br>