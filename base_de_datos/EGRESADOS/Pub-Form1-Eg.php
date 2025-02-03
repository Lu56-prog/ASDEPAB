<?php
session_start();

//Guardar datos formulario 1
$_SESSION['nombreEgresadoSolicitud'] = $_POST['nombreEgresadoSolicitud'];
$_SESSION['tipodocumentoEgresadoSolicitud'] = $_POST['tipodocumentoEgresadoSolicitud'];
$_SESSION['identificacionEgresadoSolicitud'] = $_POST['identificacionEgresadoSolicitud'];
$_SESSION['edadEgresadoSolicitud'] = $_POST['edadEgresadoSolicitud'];
$_SESSION['telefonoEgresadoSolicitud'] = $_POST['telefonoEgresadoSolicitud'];
$_SESSION['correoEgresadoSolicitud'] = $_POST['correoEgresadoSolicitud'];
$_SESSION['direccionEgresadoSolicitud'] = $_POST['direccionEgresadoSolicitud'];
$_SESSION['fnacimientoEgresadoSolicitud'] = $_POST['fnacimientoEgresadoSolicitud'];
$_SESSION['paisEgresadoSolicitud'] = $_POST['paisEgresadoSolicitud'];
$_SESSION['ciudadEgresadoSolicitud'] = $_POST['ciudadEgresadoSolicitud'];

header("Location: /htmls-pagina-trabajo/Egresado/Pub-Form2-Eg.html");
exit();
?>
