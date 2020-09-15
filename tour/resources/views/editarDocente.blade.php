@extends('plantilla')

@section('main')

<section class="editar-Clase">
  
        <h3>Editar un Docente</h3>
        <br>
        <form action="/editarDocente/{{$docentes->id}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div>
          <label for="Nombre">Nombre:</label>
          <input type="text" name="nombre" value="{{$docentes->nombre}}">
          @error('nombre')
          <small class="error">{{$message}}</small>
            @enderror
          </div>

          <label for="Nombre">Descripción:</label>
          <input type="text" name="Descripcion" value="{{$docentes->descripcion}}">
          @error('descripcion')
          <small class="error">{{$message}}</small>
            @enderror
          </div>
          
          <div>
            <label for="archivo"></label>
            <div>
              <img src="/storage/{{$docentes->foto}}">
            <input type="file" name="foto" id="foto">
            @error('foto')
            <small class="error">{{$message}}</small>  
            @enderror
            <div>
              <input type="submit" onclick="return confirm('docente Editado con exito!')" value="Guardar Cambios">
              </div>
          </div>

        </form>
        


      

</section>
    
@endsection