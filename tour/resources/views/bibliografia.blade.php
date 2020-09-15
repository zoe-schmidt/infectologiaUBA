@extends("plantilla")
@section("main")

<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/css/bibliografia.css">


<section class="contenedor-bibliografia">

  <div class="titulo-bibliografia">
      <h2>Bibliografía</h2>
  </div>


  <div class="contenido-bibliografia"></div>

    <ul type= "circle" class="listado-bibliografia">
      @foreach ($bibliografias as $bibliografia)
      <li>
        <p>{{$bibliografia->titulo}}</p>
      </li>

      <li>
        <a href="/bibliografia/{{$bibliografia->id}}">descarga</a>
      </li>
          
      @endforeach
    </ul>

</section>


@endsection
