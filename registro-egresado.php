<?php
// Conectando con la base de datos
$conexion = mysqli_connect("localhost", "root", "", "asdepab");

$nombreEgresado = $_POST['nombreEgresado'];
$tipodocumentoEgresado = $_POST['tipodocumentoEgresado'];
$identificacionEgresado = $_POST['identificacionEgresado'];
$passwordEgresado = $_POST['passwordEgresado'];
$correoEgresado= $_POST['correoEgresado'];
$telefonoEgresado = $_POST['telefonoEgresado'];
$nacimientoEgresado = $_POST['nacimientoEgresado'];
$tecnicaEgresado= $_POST['tecnicaEgresado'];

$query = "INSERT INTO `registro-egresados`(`nombreEgresado`, `tipodocumentoEgresado`, `identificacionEgresado`, `passwordEgresado`, `correoEgresado`, `telefonoEgresado`, `nacimientoEgresado`, `tecnicaEgresado`) VALUES ('$nombreEgresado', '$tipodocumentoEgresado', '$identificacionEgresado', '$passwordEgresado', '$correoEgresado', '$telefonoEgresado', '$nacimientoEgresado', '$tecnicaEgresado')";

mysqli_query($conexion, $query);

mysqli_close($conexion);

echo "El alumno fue dado de alta.";
?>