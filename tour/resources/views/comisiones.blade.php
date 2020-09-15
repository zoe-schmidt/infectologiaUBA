@extends("plantilla")
@section("main")

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/comisiones.css">
    <title></title>
  </head>
  
  <body>

    <section class="contenedor-sitio">
      <div class="titulo-sitio">
          <h2>Comisiones</h2>
      </div>

      <div class="comisiones">
        
        <ul>
          @foreach ($comisiones as $comision)
          <li>
            <div class="imagen-comision">
              <img src="/storage/{{$comision->archivo}}" alt="imagen comision">
              </div>
          </li>
         
          @endforeach
         
        </ul>
      
          
      </div>
    </section>
  </body>
</html>

@endsection
