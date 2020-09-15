@extends("plantilla")
@section("main")

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/cuerpoDocente.css">
    <title>Cuerpo Docente</title>
  </head>
  <body>

    <div class="cuerpo-docente">
      <div class="docente1">
        @foreach ($docentes as $docente)
        <ul>
          
            <li>
              <div class="imagen-docente">
                <img src="/storage/{{$docente->foto}}" alt="imagen">
              </div>
              </li>  
              <li>
                <div class="descripcion-docente">
                  <p class="nombre-docente">{{$docente->nombre}}</p>
                </div>
              </li>
              <li>
                <p class="cargos-docente">{{$docente->descripcion}}</p>
              </li>
            </ul>
          </div>
          @endforeach
        </div>

        
      
    </div>
  </body>
</html>

@endsection
