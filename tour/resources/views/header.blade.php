<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/header.css">
    <title>Header</title>
</head>
<body>
   <div class="contenedor-principal">
       <header>

         <div class="imagen-uba">
           <img src="/imagenes/logo-uba.png" alt="uba">
         </div>

           <div class="titulo-principal">
               <h4>Catedra de <br> Infectología</h4>
           </div>


           <!--MENU MOBILE-->

           <div class="menu-mobile">
             <div class="fixed-top">
               <div class="collapse" id="navbarToggleExternalContent">
                 <div class="hamburgesa">
                   <ul class="listado-mobile">
                     <li class="text-muted">Cronograma</li>
                     <li class="text-muted">Clases</li>
                     <li class="text-muted">Casos Clinicos</li>
                     <li class="text-muted">Cuerpo Docente</li>
                     <li class="text-muted">Bibliografía</li>
                    </div>
                  </ul>

                </div>
                <nav class="navbar navbar-dark">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </nav>
              </div>
            </div>

                  <!--- MENU ESCRITORIO!-->


             <div class="usuario-escritorio">
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Usuario
                  </button>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      <ul type="bullet">
                        <li>Cambiar contraseña</li>
                        <li id="sesion"> Cerrar sesión</li>
                        </ul>
                    </div>
                  </div>
              </div>

                <br>
                <br>
                <br>
                <nav id="menu-escritorio" class="navbar navbar-expand-lg navbar-light">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Secciones
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="#">Clases</a>
                          <a class="dropdown-item" href="#">Casos Clinicos</a>
                          <a class="dropdown-item" href="#">Cuerpo Docente</a>
                          <a class="dropdown-item" href="#">Bibliografía</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Comisiones</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                      </li>
                    </ul>
                  </div>
                </nav>



          </header>




        </div>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
