<?php include("header.php"); ?>
  <body class="bg-light">
    <script>
      function buscar(){
          var opcion = document.getElementById('id_alumno').value;
          if (opcion=="") {
            window.location.href = 'reservar.php?registro=0';
            alert("Ingresa el ID del alumno");
          }else {
            window.location.href = 'reservar.php?registro='+opcion;
            $(function() {
              $('#myModal').modal();
            });
          }
      }
  </script>
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-color-nav">
      <a class="navbar-brand">Biblioteca Central</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="visita.php?registro=0"><i class="fa fa-file-contract"></i> Bitácora de visitas</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-id-card-alt"></i> Reservaciones</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item active" href="reservar.php?registro=0"><i class="fa fa-address-book"></i> Reservar visita</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="reservaciones.php"><i class="fa fa-atlas"></i> Reservaciones</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAlumnos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"></i> Alumnnos</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownAlumnos">
              <a class="dropdown-item" href="registro_alumno.php"><i class="fa fa-user-plus"></i> Registrar alumno</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="consulta_alumnos.php"><i class="fa fa-user-friends"></i> Consultar registros de alumnos</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="registros.php"><i class="fa fa-book-open"></i> Registros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="usuarios.php"><i class="fa fa-user-tie"></i> Usuarios</a>
          </li>
        </ul>
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link" href="cerrar.php"><i class="fa fa-door-open"></i> Cerrar sesión</a>
          </li>
        </ul>
        </ul>
      </div>
    </nav>
    <?php include("detalle_alumno.php"); ?>
<main role="main" class="container">
  <div class="d-flex align-items-center bg-secondary p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Reservaciones de visitas</h6>
      <small>
        <?php
          echo date("d/M/Y h:i a");
        ?>
      </small>
    </div>
  </div>
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h3 class="border-bottom border-gray text-center pb-2 mb-0">Reservar visita</h3>
    <br><br>
    <form method="post" action="agregar_reservacion.php">
      <div class="form-row">

        <div class="form-group col-md-9">
          <label for="id_alumno_clas">ID Alumno</label>
          <input type="text" name="id_alumno_re" value="<?php echo $id_alumno; ?>" class="form-control" id="id_alumno" placeholder="1292">
        </div>
        <div class="form-group col-md-2">
          <label for="" class="text-white">.</label>
          <button onclick="return buscar()" title="Buscar alumno" class="btn btn-success form-control"type="button" name="enviar"><i class="fa fa-search"></i> Buscar</button>
        </div>
        <div class="form-group col-md-1">
          <label for="nombre_alumno" class="text-white">.</label>
          <a href="" ype="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success form-control" title="Consultar registro de alumnos"><i class="fa fa-users" style="font-size:20px;"></i></a>
        </div>
        <div class="form-group col-md-12">
          <label for="fecha_reserva_re">Fecha de registro</label>
          <input type="date" name="fecha_reserva_re" class="form-control" id="fecha_reserva_re">
        </div>
        <div class="form-group col-md-12">
          <label for="nombre_alumno">Nombre del alumno</label>
          <input type="text" name="nombres" value="<?php echo $primer_nombre." ".$otros_nombres." ".$apellido_paterno." ".$apellido_materno; ?>" readonly class="form-control" id="nombre_alumno" >
        </div>
        <div class="form-group col-md-12">
          <label for="institucion">Institución educativa de procedencia</label>
          <input type="text" name="instituto" value="<?php echo $instituo; ?>" readonly class="form-control" id="institucion" >
        </div>
      </div>
      <br><hr><br>
      <div align="center">
        <button type="submit" class="btn btn-success" style="width: 200px; height: 50px; font-size: 18px;"><i class="far fa-address-book" style="font-size:26px;"></i> Reservar visita</button>
      </div>
    </form>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header card-header bg-secondary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Registro de alumnos</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><img src="./assets/img/search.png" alt="0" width="23"></span>
            </div>
            <input type="text" class="form-control" placeholder="Buscar registro de alumno" onkeyup="Buscar();" id="busqueda_alumno"  aria-describedby="basic-addon1">
            <a href="registro_alumno.php" title="Nuevo registro de alumnos" class="btn btn-success"><i class="fa fa-user-plus"></i> </a>
          </div>
          <br>
          <div class="table-responsive table-scroll">
           <table class="table table-striped table-hover" id="tabla_alumnos">
             <thead class="thead-light">
               <tr>
                 <th scope="col">ID Alumno</th>
                 <th scope="col">Primer Nombre</th>
                 <th scope="col">Otros Nombres</th>
                 <th scope="col">Apellido Paterno</th>
                 <th scope="col">Apellido Materno</th>
                 <th scope="col"></th>
               </tr>
             </thead>
             <tbody>
               <?php include("datos_alumnos.php"); ?>
             </tbody>
           </table>
         </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myModal" role="dialog" data-show="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="contenedor">
            <div class="half-circle-spinner">
              <div class="circle circle-1"></div>
              <div class="circle circle-2"></div>
            </div>
          </div>
          <div class="cargando">
            <strong>Espere por favor</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include("footer.php"); ?>
