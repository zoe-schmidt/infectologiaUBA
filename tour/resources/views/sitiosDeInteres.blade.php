@extends("plantilla")
@section("main")

<meta name="viewport" content="width=device-width, user-scalable=no">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="/css/sitiosDeInteres.css">


<section class="contenedor-sitio">
  
  <div class="titulo-sitio">
      <h2>Sitios de Interes</h2>
  </div>


  <div class="contenido-sitio"></div>
  
    <ul type= "circle" class="listado-sitio">
      
         @foreach ($sitios as $sitio)
    <li>
      <a href="{{$sitio->links}}">{{$sitio->nombre}}</a>
      </li> 
          @endforeach
          
    </ul>

</section>
  

@endsection
