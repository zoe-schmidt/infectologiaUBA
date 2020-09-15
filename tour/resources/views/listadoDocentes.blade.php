@extends('plantilla')

<meta charset="UTF-8">
<link rel="stylesheet" href="/css/listadoDeEdicion.css">

@section('main')

    <div class="titulo">
    <h3>Listado de Clases</h3>
        </div>

       <div class="claseNueva">
        <a href="/cargarDocente" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cargar un nuevo Docente</a>
       </div>

       <div class="encabezados">
           <ul>
               <li>Nombre</li>
               <li>Descripción</li>
               <li>Foto</li>
               <li>Acción</li>
           </ul>
       </div>

        <article class="listado">
            @foreach ($docentes as $docente)
            <ul>
                    <li>
                        <div class="nombre">
                            <p>{{$docente->nombre}}</p>
                            </div>
                        </li>

                        <li>
                            <div class="nombre">
                                <p>{{$docente->descripcion}}</p>
                                </div>
                            </li>

                    <li>
                       <div class="archivo">
                        <img src="/storage/{{$docente->foto}}">
                         </div> 
                             </li>

                            <div class="botones">
                    <li class="boton">
                            
                        <a href="/editarDocente/{{$docente->id}}"><button type="button" class="btn btn-success">Editar</button></a>
                    </li>

                    <li class="boton">
                   <form action="/listadoDocentes" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$docente->id}}">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Esta seguro de Borrar los Datos?')"; value="borrar">Borrar</button>
                    
                </form>

                    </div>
                    
                    </li>
                </ul>

                @endforeach
        </article>


    </section>
    

@endsection