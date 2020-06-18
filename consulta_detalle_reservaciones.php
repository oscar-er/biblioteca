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
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-id-card-alt"></i> Reservaciones</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="reservar.php?registro=0"><i class="fa fa-address-book"></i> Reservar visita</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item active" href="reservaciones.php"><i class="fa fa-atlas"></i> Reservaciones</a>
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

<main role="main" class="container">
  <div class="d-flex align-items-center bg-secondary p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <div class="lh-100">
      <h6 class="mb-0 text-white lh-100">No. de reservación: <?php echo $id_reserva; ?></h6>
      <small>
        <?php
          echo date("d/M/Y h:i a");
        ?>
      </small>
    </div>
  </div>
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <form>
      <div class="float-right">
        <button type="button" onclick="location.href='reservaciones.php'" class="btn btn-info" title="Editar registro" style="font-size: 18px;" name="agregar"><i style="font-size: 22px;" class="fa fa-arrow-alt-circle-left"></i> Regresar</button>
      </div>
      <br><br>
      <div class="table-responsive">
        <table class="table table-striped table-condensed">
          <tr>
            <th>Fecha de reservación</th>
            <td><input type="date" name="fecha_nacimiento_ed" value="<?php echo $fecha_reserva; ?>" class="form-control"> </td>
          </tr>
         <tr>
           <th>Primer nombre</th>
           <td><input type="text" name="nombre_alumno_ed" value="<?php echo $primer_nombre_re; ?>" maxlength="45" class="form-control"> </td>
         </tr>
         <tr>
           <th>Otros nombres</th>
           <td><input type="text" name="otros_nombres_ed" value="<?php echo $otros_nombres_re; ?>" maxlength="70" class="form-control"> </td>
         </tr>
         <tr>
           <th width="20%">Apellido paterno</th>
           <td><input type="text" name="apellido_paterno_ed"value="<?php echo $apellido_paterno_re; ?>" maxlength="45" class="form-control"> </td>
         </tr>
         <tr>
           <th width="20%">Apellido materno</th>
           <td><input type="text" name="apellido_materno_ed" value="<?php echo $apellido_materno_re; ?>" class="form-control" maxlength="45"> </td>
         </tr>
           <th>Instituto de procedencia</th>
           <td><input type="text" name="instituto_ed" value="<?php echo $instituo_re; ?>" class="form-control" maxlength="170"> </td>
         </tr>
         <tr>
           <th>Teléfono de contacto</th>
           <td><input type="text" name="telefono_ed" value="<?php echo $telefono_re; ?>" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10"> </td>
         </tr>
       </table>
     </div>
   </form>
  </div>
</main>
<div class="modal fade" id="elimiar_alumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel">ALERTA</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="">
          <p class="text-center">¿Estas seguro que deseas elimiar el registro?</p>
          <p>Una ves efectuado los cambios no podrán ser recuperados.</p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="location.href='eliminar_registro_alumno.php?registro=<?php echo $id_alumno; ?>'" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Eliminar</button>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>
