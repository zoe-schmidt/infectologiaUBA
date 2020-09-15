@extends("plantilla")


@section('main')

<link rel="stylesheet" href="/css/cargar.css">

<section id="crono" class="cargarCronograma">

    <h3>Cargar una Comisión</h3>
    <br>
    <form action="/comisiones" method="post" enctype="multipart/form-data">
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
          <input type="button" value="Borrar">
          </div>
      </div>

    </form>



  </section>



@endsection
