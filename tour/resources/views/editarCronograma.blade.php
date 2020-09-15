@extends('plantilla')

@section('main')

<section class="editar-Cronograma">
  
        <h3>Editar un Cronograma</h3>
        <br>
        <form action="/editarCronograma/{{$cronogramas->id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div>
          <label for="Nombre">Nombre:</label>
          <input type="text" name="nombre" value="{{$cronogramas->nombre}}">
          @error('nombre')
          <small class="error">{{$message}}</small>
            @enderror
          </div>

          <div>
            <label for="archivo"></label>
            <div>
              <iframe src="/storage/{{$cronogramas->archivo}}" frameborder="0"></iframe>
            <input type="file" name="archivo" id="archivo">
            @error('archivo')
            <small class="error">{{$message}}</small>  
            @enderror
            <div>
              <input type="submit" onclick="return confirm('clase Editada con exito!')" value="Guardar Cambios">
              </div>
          </div>

        </form>
        


      

</section>
    
@endsection