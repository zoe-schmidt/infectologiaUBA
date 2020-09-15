@extends('plantilla')

<meta charset="UTF-8">
<link rel="stylesheet" href="/css/listadoDeEdicion.css">
<meta charset="UTF-8">


@section('main')

    <div class="titulo">
    <h3>Listado de Novedades</h3>
        </div>

       <div class="claseNueva">
        <a href="/cargarNovedades" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cargar una nueva Noticia</a>
       </div>

       <div class="encabezados">
           <ul>
               <li>Nombre</li>
               <li>Archivo</li>
               <li>Acción</li>
           </ul>
       </div>

        <article class="listado">
            @foreach ($novedades as $novedades)
            <ul>
                    <li>
                        <div class="nombre">
                            <p>{{$novedades->titulo}}</p>
                            </div>
                        </li>

                    <li>
                       <div class="archivo">
                        <p>{{$novedades->descripcion}}</p>
                         </div> 
                             </li>

                            <div class="botones">
                    <li class="boton">
                            
                        <a href="/editarNovedades/{{$novedades->id}}"><button type="button" class="btn btn-success">Editar</button></a>
                    </li>

                    <li class="boton">
                   <form action="/listadoNovedades" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$novedades->id}}">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Esta seguro de Borrar la noticia?')"; value="borrar">Borrar</button>
                    
                </form>

                    </div>
                    
                    </li>
                </ul>
                @endforeach
        </article>


    </section>
    

@endsection