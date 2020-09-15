@extends('plantilla')

@section('main')

<section class="editar-caso-clinico">
  
        <h3>editar un caso Clinico</h3>
        <br>
        <form action="/editarCasoClinico/{{$casos->id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div>
          <label for="Nombre">Nombre:</label>
          <input type="text" name="nombre" value="{{$casos->nombre}}">
          @error('nombre')
          <small class="error">{{$message}}</small>
            @enderror
          </div>

          <div>
            <label for="archivo"></label>
            <div>
              <iframe src="/storage/{{$casos->archivo}}" frameborder="0"></iframe>
            <input type="file" name="archivo" id="archivo">
            @error('archivo')
            <small class="error">{{$message}}</small>  
            @enderror
            <div>
              <input type="submit" onclick="return confirm('caso Editado con exito!')" value="Guardar Cambios">
              </div>
          </div>

        </form>
        


      

</section>
    
@endsection