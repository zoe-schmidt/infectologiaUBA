@extends('plantilla')

@section('main')

<section class="editar-noticias">
  
    <h3>Editar una Noticia</h3>
    <br>
    <form action="/editarNovedades/{{$novedades->id}}" method="post" >
      {{ csrf_field() }}
      <div>
      <label for="titulo">titulo</label>
      <input type="text" name="titulo" value="{{$novedades->titulo}}">
      @error('titulo')
      <small class="error">{{$message}}</small>
        @enderror
      </div>

      <div>
        <label for="descripcion"></label>
        <div>
    
        <textarea name="descripcion" cols="30" rows="10" >{{$novedades->descripcion}}</textarea>
        @error('descripcion')
        <small class="error">{{$message}}</small>  
        @enderror
        <div>
          <input type="submit" onclick="return confirm('Novedad Editada con exito!')" value="Guardar Cambios">
          </div>
      </div>

    </form>
    


  

</section>
    
@endsection