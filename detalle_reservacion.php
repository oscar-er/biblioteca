<?php
  session_start();
  if (!$_SESSION['usuario_sesion']) {
    header("location: error_acceso.php");
  }
  include("conexion.php");
  $registro = $_GET["registro"];
  $consulta_reservas = $conn->query("SELECT * FROM registros_biblioteca.reservas AS reserva INNER JOIN registros_biblioteca.registros AS registros ON reserva.id_alumno = registros.id_alumno WHERE reserva.id_reserva = $registro");
  $datos = $consulta_reservas->fetchAll(PDO::FETCH_OBJ);
  foreach ($datos as $dato) {
    $primer_nombre_re = $dato->primer_nombre;
    $otros_nombres_re = $dato->otros_nombres;
    $apellido_paterno_re = $dato->apellido_paterno;
    $apellido_materno_re = $dato->apellido_materno;
    $id_reserva = $dato->id_reserva;
    $fecha_reserva = $dato->fecha_reserva;
    $instituo_re = $dato->instituto;
    $telefono_re = $dato->telefono;
  }
  $conn = null;

?>
