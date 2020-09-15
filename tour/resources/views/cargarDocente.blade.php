@extends('plantilla')

@section('main')

<link rel="stylesheet" href="/css/cargar.css">
<section class="cargarClase">

    <h3>Cargar un Nuevo Docente</h3>
    <br>
    <form id="cuerpo" action="/cuerpoDocente" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div>
      <label id="no" for="Nombre">Nombre:</label>
      <input type="text" name="nombre" value="">
      @error('nombre')
      <small class="error">{{$message}}</small>
        @enderror
      </div>

      <label for="descripcion">Descripción:</label>
      <input type="text" name="descripcion" value="">
      @error('descripcion')
      <small class="error">{{$message}}</small>
        @enderror
      </div>

      <div>
        <label for="foto"></label>
        <input type="file" name="foto" id="foto">
        @error('foto')
        <small class="error">{{$message}}</small>
        @enderror
        <div>
          <input type="submit" value="Cargar">
          </div>
      </div>

    </form>



  </section>

@endsection
