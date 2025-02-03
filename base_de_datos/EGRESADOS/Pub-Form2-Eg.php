<?php
//Conectando a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "asdepab");

//Datos formulario 1
session_start();
$nombreEgresadoSolicitud1 = $_SESSION['nombreEgresadoSolicitud'];
$tipodocumentoEgresadoSolicitud1 = $_SESSION['tipodocumentoEgresado'];
$identificacionEgresadoSolicitud1 = $_SESSION['identificacionEgresadoSolicitud'];
$edadEgresadoSolicitud1 = $_SESSION['edadEgresadoSolicitud'];
$telefonoEgresadoSolicitud1 = $_SESSION['telefonoEgresadoSolicitud'];
$correoEgresadoSolicitud1 = $_SESSION['correoEgresadoSolicitud'];
$direccionEgresadoSolicitud1 = $_SESSION['direccionEgresadoSolicitud'];
$fnacimientoEgresadoSolicitud1 = $_SESSION['fnacimientoEgresadoSolicitud'];
$paisEgresadoSolicitud1 = $_SESSION['paisEgresadoSolicitud'];
$ciudadEgresadoSolicitud1 = $_SESSION['ciudadEgresadoSolicitud'];

//Datos formulario 2
$perfilEgresadoSolicitud = $_POST['perfilEgresadoSolicitud'];
$añexperienciaEgresadoSolicitud = $_POST['añexperienciaEgresadoSolicitud'];
$salarioEgresadoSolicitud = $_POST['salarioEgresadoSolicitud'];
$nivelestudioEgresadoSolicitud = $_POST['nivelestudioEgresadoSolicitud'];
$desestudiosEgresadoSolicitud= $_POST['desestudiosEgresadoSolicitud'];
$desexperienciaEgresadoSolicitud = $_POST['desexperienciaEgresadoSolicitud'];
$hojadevidaEgresadoSolicitud = $_POST['hojadevidaEgresadoSolicitud'];
$fotoEgresadoSolicitud= $_POST['fotoEgresadoSolicitud'];
$fechainicioEgresadoSolicitud = $_POST['fechainicioEgresadoSolicitud'];
$fechafinalEgresadoSolicitud= $_POST['fechafinalEgresadoSolicitud'];

$query = "INSERT INTO `solicitudes-egresados-formulario`(`nombreEgresadoSolicitud`, `tipodocumentoEgresadoSolicitud`, `identificacionEgresadoSolicitud`, `edadEgresadoSolicitud`, `telefonoEgresadoSolicitud`, `correoEgresadoSolicitud`, `direccionEgresadoSolicitud`, `fnacimientoEgresadoSolicitud`, `paisEgresadoSolicitud`, `ciudadEgresadoSolicitud`, `perfilEgresadoSolicitud`, `añexperienciaEgresadoSolicitud`, `salarioEgresadoSolicitud`, `nivelestudioEgresadoSolicitud`, `desestudiosEgresadoSolicitud`, `desexperienciaEgresadoSolicitud`, `hojadevidaEgresadoSolicitud`, `fotoEgresadoSolicitud`, `fechainicioEgresadoSolicitud`, `fechafinalEgresadoSolicitud`) VALUES ('$nombreEgresadoSolicitud1', '$tipodocumentoEgresadoSolicitud1', '$identificacionEgresadoSolicitud1', '$edadEgresadoSolicitud1', '$telefonoEgresadoSolicitud1', '$correoEgresadoSolicitud1', '$direccionEgresadoSolicitud1', '$fnacimientoEgresadoSolicitud1', '$paisEgresadoSolicitud1', '$ciudadEgresadoSolicitud1', '$perfilEgresadoSolicitud', '$añexperienciaEgresadoSolicitud', '$salarioEgresadoSolicitud', '$nivelestudioEgresadoSolicitud', '$desestudiosEgresadoSolicitud', '$desexperienciaEgresadoSolicitud', '$hojadevidaEgresadoSolicitud', '$fotoEgresadoSolicitud', '$fechainicioEgresadoSolicitud', '$fechafinalEgresadoSolicitud')";

if (mysqli_query($conexion, $query)) {
    echo "Los datos fueron guardados correctamente.";
} else {
    echo "Error al guardar los datos: " . mysqli_error($conexion);
}

// Cerrando la conexión
mysqli_close($conexion);
?>
