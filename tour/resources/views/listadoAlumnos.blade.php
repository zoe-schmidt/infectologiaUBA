@extends('plantilla')

<meta charset="UTF-8">
<link rel="stylesheet" href="/css/listadoDeEdicion.css">

@section('main')

    <div class="titulo">
    <h3>Listado de Alumnos</h3>
        </div>

      

       <div class="encabezados">
           <ul>
               <li>Nombre</li>
               <li>Apellido</li>
               <li>Email</li>
               <li>Fecha de Inscripción</li>
               <li>Acción</li>
           </ul>
       </div>

        <article class="listado">
            @foreach ($alumnos as $alumno)
            <ul>
                    <li>
                        <div class="nombre">
                            <p>{{$alumno->nombre}}</p>
                            </div>
                        </li>

                    <li>
                        <div class="nombre">
                            <p>{{$alumno->apellido}}</p>
                            </div>
                        </li> 
                             </li>

                             <li>
                                <div class="nombre">
                                    <p>{{$alumno->email}}</p>
                                    </div>
                                </li> 
                                     </li>

                                     
                             <li>
                                <div class="nombre">
                                    <p>{{$alumno->created_at->format('d.m.Y')}}</p>
                                    </div>
                                </li> 
                                     </li>
        

                            <div class="botones">

                    <li class="boton">
                   <form action="/listadoAlumnos" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$alumno->id}}">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('los datos se eliminaran completamente, esta seguro de continuar?')"; value="borrar">Borrar</button>
                    
                </form>

                    </div>
                    
                    </li>
                </ul>

                @endforeach
        </article>


    </section>
    

@endsection