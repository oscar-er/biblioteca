<?php

  session_start();
  if (!$_SESSION['usuario_sesion']) {
    header("location: error_acceso.php");
  }

  include("conexion.php");

  $consulta = $conn->query("SELECT * FROM registros_biblioteca.registros AS RR INNER JOIN registros_biblioteca.visitas AS RV ON RR.id_alumno = RV.id_alumno ORDER BY RV.id_registro ASC");
  $datos = $consulta->fetchAll(PDO::FETCH_OBJ);

  if ($consulta->rowCount() > 0) {
    foreach ($datos as $dato) {
      echo " <tr>".
                "<td>".$dato->id_registro."</td>".
                "<td>".$dato->primer_nombre." ".$dato->otros_nombres." ".$dato->apellido_paterno." ".$dato->apellido_materno."</td>".
                "<td>".$dato->fecha_registro."</td>".
                "<td>".$dato->instituto."</td>".
              "</tr>"
        ;
    }
  }else {
    echo "<tr>".
            "<td colspan='7' class='text-center'>La base de datos se encuentra vacía, no se pudierón recuperar registros</td>".
          "</tr>"
    ;
  }
  $conn = null;
?>
