<?php
  session_start();
  if (!$_SESSION['usuario_sesion']) {
    header("location: error_acceso.php");
  }
  include("conexion.php");
  $id_alumno_el = $_GET['registro'];
  try {
    $sql = $conn->prepare("DELETE FROM registros_biblioteca.registros WHERE id_alumno=?;");
    $resultado = $sql->execute([$id_alumno_el]);
    header('Refresh: 4; URL=consulta_alumnos.php');
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Biblioteca del Centro de Perote</title>
        <link rel="stylesheet" href="./css/inicio.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
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
                  <a class="dropdown-item" href="#">Reservas</a>
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
                <a class="nav-link" href="registros.php"><i class="fa fa-user-tie"></i> Usuarios</a>
              </li>
            </ul>
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fa fa-door-open"></i> Cerrar sesión</a>
              </li>
            </ul>
            </ul>
          </div>
        </nav>
        <main role="main" class="container">
          <div class="d-flex align-items-center bg-secondary p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
            <div class="lh-100">
              <h6 class="mb-0 text-white lh-100">Registro de alumno</h6>
              <small>'
                  .date("d/M/Y h:i a").
              '</small>
              <br><br>
              <h6 class="mb-0 text-white lh-100">ID Alumno:<?php echo $id_alumno; ?></h6>
            </div>
          </div>
          <div class="my-3 p-3 bg-white rounded shadow-sm">
            <div align="center">
            <div class="half-circle-spinner">
              <div class="circle circle-1"></div>
              <div class="circle circle-2"></div>
            </div>
          </div><br><br>
          <div class="alert alert-success text-center" role="alert">
            El registro se actualizo correctamente
          </div>
        </main>
    ';
  } catch (\Exception $e) {
    header('Refresh: 4; URL=consulta_detalle_alumno.php?registro='.$id_alumno_el);
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Biblioteca del Centro de Perote</title>
        <link rel="stylesheet" href="./css/inicio.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
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
                  <a class="dropdown-item" href="#">Reservas</a>
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
              <h6 class="mb-0 text-white lh-100">Registro de alumno</h6>
              <small>'
                  .date("d/M/Y h:i a").
              '</small>
              <br><br>
              <h6 class="mb-0 text-white lh-100">ID Alumno:<?php echo $id_alumno; ?></h6>
            </div>
          </div>
          <div class="my-3 p-3 bg-white rounded shadow-sm">
            <div align="center">
            <div class="half-circle-spinner">
              <div class="circle circle-1"></div>
              <div class="circle circle-2"></div>
            </div>
          </div>
          <br><br>
          <div class="alert alert-danger text-center" role="alert">
            El registro no puede ser eliminado, ya que cuenta con un historial de actividad. Verifica con el administrador.
          </div>
        </main>
    ';
  }
 ?>
