<?php

  session_start();
  include("conexion.php");
  $usuario = $_POST['usuario_restablecer'];
  $password = $_POST['password_restablecer'];
  $password_confirmar = $_POST['password_confirmar'];

  $consulta_usuario = $conn->query("SELECT usuario FROM registros_biblioteca.usuarios WHERE usuario = '$usuario';");
  $datos = $consulta_usuario->fetchAll(PDO::FETCH_OBJ);
  foreach ($datos as $dato) {
    $user_name = $dato->usuario;
  }

  if ($password == $password_confirmar) {
    if ($usuario == $user_name) {
      $opciones = [ 'cost' => 12, ];
      $hash = password_hash($password, PASSWORD_BCRYPT, $opciones);
      $query_actualizar = $conn->prepare("UPDATE registros_biblioteca.usuarios SET contrasenia = ? WHERE usuario = ?");
      $resultado = $query_actualizar->execute([$hash, $usuario]);
      header('Refresh: 3; URL=index.php');
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
            <div style="margin-top: 20px; font-family: serif; font-size: 24px; text-align: center;">
            <h2>Registro exitoso</h2>
            </div>
          </body>
        </html>
      ';
    }else {
      header('Refresh: 3; URL=restablecer.php');
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
              <form action="editar_usuario.php" onsubmit="return buscar()" method="post" class="border p-3 form">
                <div class="text-center">
                  <h2 class="h2-login">Restablecer contraseña</h2>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" name="usuario_restablecer" id="usuario" placeholder="Nombre de usuario" required>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                  </div>
                  <input type="password" name="password_restablecer" class="form-control" id="password" placeholder="Contraseña nueva" required>
                  <div class="input-group-append">
                    <button id="show_password" class="btn-success" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                  </div>
                  <input type="password" name="password_confirmar" class="form-control" id="pass_confir" placeholder="Confirmar contraseña" require>
                </div>
                <div class="float-right">
                  <a class="lost-password" href="index.php">Iniciar sesión</a>
                </div>
                <div class="alert alert-warning text-center" role="alert">
                  El nombre de usuario no existe, intentalo nuevamente.
                </div>
                <div>
                  <button type="submit" class="btn-success-login">Confirmar</button>
                </div>
              </form>
            </div>
          </div>
      </body>
      </html>
      ';
    }
  }else {
    header('Refresh: 3; URL=restablecer.php');
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
            <form action="editar_usuario.php" onsubmit="return buscar()" method="post" class="border p-3 form">
              <div class="text-center">
                <h2 class="h2-login">Restablecer contraseña</h2>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                </div>
                <input type="text" class="form-control" name="usuario_restablecer" id="usuario" placeholder="Nombre de usuario" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" name="password_restablecer" class="form-control" id="password" placeholder="Contraseña nueva" required>
                <div class="input-group-append">
                  <button id="show_password" class="btn-success" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                </div>
                <input type="password" name="password_confirmar" class="form-control" id="pass_confir" placeholder="Confirmar contraseña" required>
              </div>
              <div class="float-right">
                <a class="lost-password" href="index.php">Iniciar sesión</a>
              </div>
              <div class="alert alert-warning text-center" role="alert">
                La contraseña no coincide, intentalo nuevamente.
              </div>
              <div>
                <button type="submit" class="btn-success-login">Confirmar</button>
              </div>
            </form>
          </div>
        </div>
    </body>
    </html>
    ';
  }

  $conn = null;

 ?>
