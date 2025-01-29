<?php
// Conectando con base de datos
$conexion = mysqli_connect("localhost", "root", "", "asdepab") or
die("Problemas con la conexión");


mysqli_query($conexion, "INSERT INTO `registro-egresados`(`nombreEgresado`, `tipodocumentoEgresado`, `identificacionEgresado`, `passwordEgresado`, `correoEgresado`, `telefonoEgresado`, `nacimientoEgresado`, `tecnicaEgresado`) VALUES ('$_POST[nombreEgresado]','$_POST[tipodocumentoEgresado]','$_POST[identificacionEgresado]','$_POST[passwordEgresado]','$_POST[correoEgresado]','$_POST[telefonoEgresado]','$_POST[nacimientoEgresado]', '$_POST[tecnicaEgresado]')")
or die("Problemas en el select" . mysqli_error($conexion));

mysqli_close($conexion);

echo "El alumno fue dado de alta.";

?>