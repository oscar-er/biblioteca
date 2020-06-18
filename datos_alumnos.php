<?php

  session_start();
  if (!$_SESSION['usuario_sesion']) {
    header("location: error_acceso.php");
  }

  include("conexion.php");

  $consulta = $conn->query("SELECT id_alumno, primer_nombre, otros_nombres, apellido_paterno, apellido_materno FROM registros_biblioteca.registros ORDER BY id_alumno ASC");
  $datos = $consulta->fetchAll(PDO::FETCH_OBJ);
  if ($consulta->rowCount() > 0) {
    foreach ($datos as $dato) {
      echo " <tr>".
                "<td>".$dato->id_alumno."</td>".
                "<td>".$dato->primer_nombre."</td>".
                "<td>".$dato->otros_nombres."</td>".
                "<td>".$dato->apellido_paterno."</td>".
                "<td>".$dato->apellido_materno."</td>".
                "<td><a href="."consulta_detalle_alumno.php?registro=".$dato->id_alumno." title="."'Consultar registro del alumno' class="."'btn btn-info'"."><i class='fa fa-file-alt'></i></a></td>".
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
