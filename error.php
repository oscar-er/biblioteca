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
  <body onload="redireccionar()" class="body-login">
    <script language="JavaScript">
        function redireccionar() {
            setTimeout('history.back()',10000);
        }
    </script>
    <div class="container">
      <div class="abs-center">
        <div class="text-light text-justify">
          <i class="fa fa-exclamation-triangle float-left" style="font-size: 40px;"></i>
          <h1>Error 404 encontrado</h1>
          <h4>La página que busca no existe</h4>
          <p>Por favor verifique que la dirección URL sea correcta.</p>
          <p>Espere mientras el sistema lo redirecciona o <a class="lost-password" href="index.php">inicia sesión aquí</a></p>
          <p><b>¿Por qué aparece el error 404?</b> </p>
          <ul>
            <li>Es posible que la dirección URL que busca no exista o se encuentra temporalmente fuera de línea.</li>
            <li>Puede ser que haya cambiado la dirección que busca.</li>
          </ul>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="./js/jquery-functions.js" charset="utf-8"></script>
</body>
</html>
