<?php
session_start();
?>
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
    <script>
      function buscar(){
        $(function() {
          $('#myModal').modal();
        });
      }

      function mostrarPassword(){
          var password = document.getElementById("password");
          var password_confir = document.getElementById("pass_confir");
          if(password.type == "password" && password_confir.type == "password"){
            password.type = "text";
            password_confir.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
          }else{
            password.type = "password";
            password_confir.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
          }
        }
    </script>
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
            <input type="text" class="form-control" name="usuario_restablecer" id="usuario" placeholder="Nombre de usuario" maxlength="25" required>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" name="password_restablecer" class="form-control" id="password" placeholder="Contraseña nueva" maxlength="25" required>
            <div class="input-group-append">
              <button id="show_password" class="btn-success" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>
          </div>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
            </div>
            <input type="password" name="password_confirmar" class="form-control" id="pass_confir" placeholder="Confirmar contraseña" maxlength="25" required>
          </div>
          <div class="float-right">
            <a class="lost-password" href="index.php">Iniciar sesión</a>
          </div>
          <div>
            <button type="submit" class="btn-success-login" >Confirmar</button>
          </div>
        </form>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="./js/jquery-functions.js" charset="utf-8"></script>
</body>
</html>
