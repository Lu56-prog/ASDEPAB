<?php
// Conectando con la base de datos
$conexion = mysqli_connect("localhost", "root", "", "asdepab");

$nombreEmpresa = $_POST['nombreEmpresa'];
$nitEmpresa = $_POST['nitEmpresa'];
$passwordEmpresa = $_POST['passwordEmpresa'];
$actividadEmpresa= $_POST['actividadEmpresa'];
$entidadEmpresa = $_POST['entidadEmpresa'];
$paisEmpresa = $_POST['paisEmpresa'];
$ciudadEmpresa= $_POST['ciudadEmpresa'];
$direccionEmpresa = $_POST['direccionEmpresa'];
$celularEmpresa= $_POST['celularEmpresa'];
$telefonoEmpresa = $_POST['telefonoEmpresa'];
$emailEmpresa = $_POST['emailEmpresa'];
$descripcionEmpresa= $_POST['descripcionEmpresa'];
$imagenEmpresa = $_POST['imagenEmpresa'];

$query = "INSERT INTO `registro-empresas`(`nombreEmpresa`, `nitEmpresa`, `passwordEmpresa`, `actividadEmpresa`, `entidadEmpresa`, `paisEmpresa`, `ciudadEmpresa`, `direccionEmpresa`, `celularEmpresa`, `telefonoEmpresa`, `emailEmpresa`, `descripcionEmpresa`, `imagenEmpresa`) VALUES ('$nombreEmpresa', '$nitEmpresa', '$passwordEmpresa', '$actividadEmpresa', '$entidadEmpresa', '$paisEmpresa', '$ciudadEmpresa', '$direccionEmpresa', '$celularEmpresa', '$telefonoEmpresa', '$emailEmpresa', '$descripcionEmpresa', '$imagenEmpresa')";

if (mysqli_query($conexion, $query)) {
    echo "Los datos fueron guardados correctamente.";
} else {
    echo "Error al guardar los datos: " . mysqli_error($conexion);
}

// Cerrando la conexión
mysqli_close($conexion);
?>