<?php
  session_start();
  if (!$_SESSION['usuario_sesion']) {
    header("location: error_acceso.php");
  }
  include("conexion.php");
  $registro = $_GET["registro"];
  $consulta_alumno = $conn->query("SELECT * FROM registros_biblioteca.registros WHERE id_alumno = $registro");
  $datos = $consulta_alumno->fetchAll(PDO::FETCH_OBJ);
  foreach ($datos as $dato) {
    $id_alumno = $dato->id_alumno;
    $primer_nombre = $dato->primer_nombre;
    $otros_nombres = $dato->otros_nombres;
    $apellido_paterno = $dato->apellido_paterno;
    $apellido_materno = $dato->apellido_materno;
    $fecha_nacimiento = $dato->fecha_nacimiento;
    $nivel_academico = $dato->nivel_academico;
    $instituo = $dato->instituto;
    $telefono = $dato->telefono;
    $domicilio = $dato->domicilio;
  }
  $conn = null;

?>
