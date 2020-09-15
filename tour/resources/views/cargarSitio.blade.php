@extends('plantilla')

@section('main')

<link rel="stylesheet" href="/css/cargar.css">
<section class="cargarClase">

    <h3>Cargar un nuevo Sitio de Interes</h3>
    <br>
    <form id="cuerpo" action="/sitiosDeInteres" method="post">
      {{ csrf_field() }}
      <div>
      <label for="Nombre">Nombre:</label>
      <input type="text" name="nombre" value="">
      @error('nombre')
      <small class="error">{{$message}}</small>
        @enderror
      </div>

      <label for="links">Link:</label>
      <input type="text" name="links" value="">
      @error('links')
      <small class="error">{{$message}}</small>
        @enderror
      </div>

      <div>
        <input type="submit" value="Cargar">
        <input type="button" value="Borrar">
        </div>

    </form>



  </section>

@endsection
