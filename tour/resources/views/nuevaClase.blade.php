@extends('plantilla');

@section('main')


<section class="cargarClase">
        
    <h3>Cargar una clase</h3>
    <br>
    <form action="/clases" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div>
      <label for="Nombre">Nombre:</label>
      <input type="text" name="nombre" value="">
      @error('nombre')
      <small class="error">{{$message}}</small>
        @enderror
      </div>

      <div>
        <label for="archivo"></label>
        <input type="file" name="archivo" id="archivo">
        @error('archivo')
        <small class="error">{{$message}}</small>  
        @enderror
        <div>
          <input type="submit" value="Cargar">
          </div>
      </div>

    </form>
    


  </section>
    
@endsection