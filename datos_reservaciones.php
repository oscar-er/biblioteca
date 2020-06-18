<?php
  session_start();
  if (!$_SESSION['usuario_sesion']) {
    header("location: error_acceso.php");
  }
  include("conexion.php");
  $consulta = $conn->query("SELECT * FROM registros_biblioteca.reservas AS RRS INNER JOIN registros_biblioteca.registros AS RRG ON RRS.id_alumno = RRG.id_alumno ORDER BY RRS.id_reserva ASC");
  $datos = $consulta->fetchAll(PDO::FETCH_OBJ);
  if ($consulta->rowCount() > 0) {
    foreach ($datos as $dato) {
      echo " <tr>".
                "<td>".$dato->id_reserva."</td>".
                "<td>".$dato->primer_nombre." ".$dato->otros_nombres." ".$dato->apellido_paterno." ".$dato->apellido_materno."</td>".
                "<td>".$dato->fecha_reserva."</td>".
                "<td>".$dato->instituto."</td>".
                "<td><a href="."consulta_detalle_reservaciones.php?registro=".$dato->id_reserva." title="."'Consultar registro del alumno' class="."'btn btn-info'"."><i class='fa fa-file-alt'></i></a></td>".
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
