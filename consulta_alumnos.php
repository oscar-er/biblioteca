<?php include("header.php"); ?>
  <body class="bg-light">
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-id-card-alt"></i> Reservaciones</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="reservar.php?registro=0"><i class="fa fa-address-book"></i> Reservar visita</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="reservaciones.php"><i class="fa fa-atlas"></i> Reservaciones</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAlumnos" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"></i> Alumnnos</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownAlumnos">
              <a class="dropdown-item" href="registro_alumno.php"><i class="fa fa-user-plus"></i> Registrar alumno</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="consulta_alumnos.php"><i class="fa fa-user-friends"></i> Consultar registros de alumnos</a>
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
<main role="main" class="container">
  <div class="d-flex align-items-center bg-secondary p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Consulta de registros de alumnos</h6>
      <small>
        <?php
          echo date("d/M/Y h:i a");
        ?>
      </small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><img src="./assets/img/search.png" alt="0" width="23"></span>
      </div>
      <input type="text" class="form-control" placeholder="Buscar registro de alumno" onkeyup="Buscar();" id="busqueda_alumno" aria-describedby="basic-addon1">
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
</main>
<div style="height: 150px;"></div>
<?php include("footer.php"); ?>
