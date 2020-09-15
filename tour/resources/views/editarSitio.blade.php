@extends('plantilla')

@section('main')

<section class="editar-noticias">
  
    <h3>Editar un Sitio</h3>
    <br>
    <form action="/editarSitio/{{$sitios->id}}" method="post" >
        {{ csrf_field() }}
        <div>
            <label for="nombre">nombre</label>
            <input type="text" name="nombre" value="{{$sitios->nombre}}">
            @error('nombre')
            <small class="error">{{$message}}</small>
                @enderror
        </div>

        <div>
            <label for="links">Links</label>
            <div>
        
            <textarea name="links" cols="30" rows="10" >{{$sitios->links}}</textarea>
            @error('links')
            <small class="error">{{$message}}</small>  
            @enderror
            <div>
            <input type="submit" onclick="return confirm('sitio editado con exito!')" value="Guardar Cambios">
            </div>
        </div>

    </form>
    
  

</section>
    
@endsection