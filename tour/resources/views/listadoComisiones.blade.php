@extends('plantilla')

<meta charset="UTF-8">
<link rel="stylesheet" href="/css/listadoDeEdicion.css">

@section('main')

    <div class="titulo">
    <h3>Listado de Comisiones</h3>
        </div>

       <div class="claseNueva">
        <a href="/cargarComision" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cargar una nueva Comisión</a>
       </div>

       <div class="encabezados">
           <ul>
               <li>Nombre</li>
               <li>Archivo</li>
               <li>Acción</li>
           </ul>
       </div>

        <article class="listado">
            @foreach ($comisiones as $comision)
            <ul>
                    <li>
                        <div class="nombre">
                            <p>{{$comision->nombre}}</p>
                            </div>
                        </li>

                    <li>
                       <div class="archivo">
                        <iframe src="/storage/{{$comision->archivo}}"  ></iframe>
                         </div> 
                             </li>

                            <div class="botones">
                    <li class="boton">
                            
                        <a href="/editarComisiones/{{$comision->id}}"><button type="button" class="btn btn-success">Editar</button></a>
                    </li>

                    <li class="boton">
                   <form action="/listadoComisiones" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$comision->id}}">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Esta seguro de Borrar la comisión?')"; value="borrar">Borrar</button>
                    
                </form>

                    </div>
                    
                    </li>
                </ul>

                @endforeach
        </article>


    </section>
    

@endsection