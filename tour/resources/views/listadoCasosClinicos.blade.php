@extends('plantilla')

<meta charset="UTF-8">
<link rel="stylesheet" href="/css/listadoDeEdicion.css">

@section('main')

    <div class="titulo">
    <h3>Listado de Casos Clinicos</h3>
        </div>

       <div class="claseNueva">
        <a href="/nuevoCasoClinico" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cargar un Nuevo Caso</a>
       </div>

       <div class="encabezados">
           <ul>
               <li>Nombre</li>
               <li>Archivo</li>
               <li>Acción</li>
           </ul>
       </div>

        <article class="listado">
            <ul>
                @foreach ($casos as $caso)
                    <li>
                        <div class="nombre">
                            <p>{{$caso->nombre}}</p>
                            </div>
                        </li>

                    <li>
                       <div class="archivo">
                        <iframe src="/storage/{{$caso->archivo}}"  ></iframe>
                         </div> 
                             </li>

                            <div class="botones">
                    <li class="boton">
                            
                        <a href="/editarCasoClinico/{{$caso->id}}"><button type="button" class="btn btn-success">Editar</button></a>
                    </li>

                    <li class="boton">
                   <form action="/listadoCasosClinicos" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$caso->id}}">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Esta seguro de Borrar la clase?')"; value="borrar">Borrar</button>
                    
                </form>

                    </div>
                    
                    </li>

                

                @endforeach
            </ul>
        </article>


    </section>
    

@endsection