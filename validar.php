<?php
  session_start();

  include("conexion.php");

  $usuario = $_POST['usuario'];
  $password = $_POST['pass'];

  $consulta_usuarios = $conn->query("SELECT usuario, contrasenia FROM registros_biblioteca.usuarios WHERE usuario='$usuario';");
  $datos = $consulta_usuarios->fetchAll(PDO::FETCH_OBJ);
  foreach ($datos as $dato) {
    $usuario_obt = $dato->usuario;
    $password_obt = $dato->contrasenia;
  }
  if (($usuario == $usuario_obt) && (password_verify($password, $password_obt))) {
    $_SESSION['usuario_sesion'] = $usuario_obt;
    header('Refresh: 1; URL=visita.php?registro=0');
    echo '
      <!DOCTYPE html>
      <html lang="es" dir="ltr">
        <head>
          <meta charset="utf-8">
          <link rel="stylesheet" href="./css/inicio.css">
          <title>Acceso a biblioteca</title>
        </head>
        <body>
          <div class="contenedor">
            <div class="half-circle-spinner">
              <div class="circle circle-1"></div>
              <div class="circle circle-2"></div>
            </div>
          </div>
        </body>
      </html>
    ';
  }else if($usuario != $usuario_obt){
    header('Refresh: 3; URL=index.php');
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
      <body class="body-login">
        <div class="container">
          <div class="abs-center">
          <form action="validar.php" onsubmit="return buscar()" method="post" class="border p-3 form">
            <div class="text-center">
              <h2 class="h2-login">Inicio de sesión</h2>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" name="pass" class="form-control" id="password" placeholder="Contraseña" required>
              <div class="input-group-append">
                <button id="show_password" class="btn-success" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
              </div>
            </div>
            <div class="alert alert-warning text-center" role="alert">
              El usuario no existe, intenta nuevamente
            </div>
            <div class="float-right">
              <small class="small-text-login">¿Olvidaste tu contraseña? <a class="lost-password" href="restablecer.php">Restablécela aquí</a></small>
            </div>
            <div>
              <button type="submit" class="btn-success-login">Ingresar</button>
            </div>
          </form>
          </div>
        </div>
        </div>
    </body>
    </html>

    ';
  }elseif ($usuario == $usuario_obt && $password != password_verify($password, $password_obt)) {
    header('Refresh: 3; URL=index.php');
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
      <body class="body-login">
        <div class="container">
          <div class="abs-center">
          <form action="validar.php" onsubmit="return buscar()" method="post" class="border p-3 form">
            <div class="text-center">
              <h2 class="h2-login">Inicio de sesión</h2>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" name="pass" class="form-control" id="password" placeholder="Contraseña" required>
              <div class="input-group-append">
                <button id="show_password" class="btn-success" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
              </div>
            </div>
            <div class="alert alert-warning text-center" role="alert">
              La contraseña no es correcta, intenta nuevamente
            </div>
            <div class="float-right">
              <small class="small-text-login">¿Olvidaste tu contraseña? <a class="lost-password" href="restablecer.php">Restablécela aquí</a></small>
            </div>
            <div>
              <button type="submit" class="btn-success-login">Ingresar</button>
            </div>
          </form>
          </div>
        </div>
        </div>
    </body>
    </html>

    ';
  }
  $conn = null;
?>
