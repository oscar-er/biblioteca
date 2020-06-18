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
              <a class="dropdown-item active" href="#"><i class="fa fa-user-plus"></i> Registrar alumno</a>
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
<main role="main" class="container">
  <div class="d-flex align-items-center bg-secondary p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">Registro de alumnos</h6>
      <small>
        <?php
          echo date("d/M/Y h:i a");
        ?>
      </small>
    </div>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h3 class="border-bottom border-gray text-center pb-2 mb-0">Formulario de registro</h3>
    <br><br>
    <form method="post" action="agregar_alumno.php">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="nombre_alumno">Primer nombre</label>
          <input type="text" name="primer_nombre" class="form-control" id="nombre_alumno" placeholder="Primer nombre del alumno" maxlength="45" required>
        </div>
        <div class="form-group col-md-6">
          <label for="otros_nombres">Otros nombres</label>
          <input type="text" name="otros_nombres" class="form-control" id="otros_nombres" placeholder="Segundo nombre del alumno" maxlength="70">
        </div>
        <div class="form-group col-md-6">
          <label for="apellido_paterno">Apellido paterno</label>
          <input type="text" name="apellido_paterno" class="form-control" id="apellido_paterno" placeholder="Primer apellido del alumno" maxlength="45">
        </div>
        <div class="form-group col-md-6">
          <label for="apellido_materno">Apellido materno</label>
          <input type="text" name="apellido_materno" class="form-control" id="apellido_materno" placeholder="Segundo apellido del alumno" maxlength="45" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="fecha_nacimiento">Fecha de nacimiento</label>
          <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" required>
        </div>
        <div class="form-group col-md-4">
          <label for="telefono">Teléfono de contacto</label>
          <input type="text" name="telefono" placeholder="000 000 0000" class="form-control" id="telefono" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10">
        </div>
        <div class="form-group col-md-4">
          <label for="nivel">Nivel académico</label>
          <select id="nivel" name="nivel" class="form-control" required>
            <option selected>Selecciona una opción</option>
            <option value="Nivel básico (primaria-secundaria)">Nivel básico (primaria-secundaria)</option>
            <option value="Nivel Media Superior (preparatoria)">Nivel Medio Superior (preparatoria)</option>
            <option value="Nivel Superior">Nivel Superior</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="domicilio">Domicilio</label>
        <input type="text" name="domicilio" class="form-control" id="domicilio" placeholder="Jacarandas 23, Col. Zona Centro" required>
      </div>
      <div class="form-group">
        <label for="instituto">Institución en la que estudia</label>
        <input type="text" name="instituto" class="form-control" id="instituto" placeholder="Universidad Tecnológica del Norte" required>
      </div>
      <br><hr><br>
      <div align="center">
        <button type="submit" class="btn-success" style="width: 200px; height: 50px; font-size: 18px;"><i class="far fa-save" style="font-size:26px;"></i> Guardar registro</button>
      </div>
    </form>
  </div>

</main>
<?php include("footer.php"); ?>
