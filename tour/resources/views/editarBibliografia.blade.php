@extends('plantilla')

@section('main')

<section class="editar-caso-clinico">
  
        <h3>editar una Bibliografía</h3>
        <br>
        <form action="/editarBibliografia/{{$bibliografia->id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div>
          <label for="titulo">Titulo:</label>
          <input type="text" name="titulo" value="{{$bibliografia->titulo}}">
          @error('titulo')
          <small class="error">{{$message}}</small>
            @enderror
          </div>

          <div>
            <label for="documento"></label>
            <div>
              <iframe src="/storage/{{$bibliografia->documento}}" frameborder="0"></iframe>
            <input type="file" name="documento" id="documento">
            @error('documento')
            <small class="error">{{$message}}</small>  
            @enderror
            <div>
              <input type="submit" onclick="return confirm('caso Editado con exito!')" value="Guardar Cambios">
              </div>
          </div>

        </form>
        


      

</section>
    
@endsection