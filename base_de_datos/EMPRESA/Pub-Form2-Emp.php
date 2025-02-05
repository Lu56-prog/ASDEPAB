<?php
//Conectando a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "asdepab");

//Datos formulario 1
session_start();
$nombreEmpresaOferta1 = $_SESSION['nombreEmpresaOferta'];
$actividadEmpresaOferta1 = $_SESSION['actividadEmpresaOferta'];
$direccionEmpresaOferta1 = $_SESSION['direccionEmpresaOferta'];
$correoEmpresaOferta1 = $_SESSION['correoEmpresaOferta'];
$contactoEmpresaOferta1 = $_SESSION['contactoEmpresaOferta'];
$otrocontactoEmpresaOferta1 = $_SESSION['otrocontactoEmpresaOferta'];

//Datos formulario 2
$cargoEmpresaOferta = $_POST['cargoEmpresaOferta'];
$contratoEmpresaOferta = $_POST['contratoEmpresaOferta'];
$jornadaEmpresaOferta = $_POST['jornadaEmpresaOferta'];
$paiscEmpresaOferta = $_POST['paiscEmpresaOferta'];
$ciudadcEmpresaOferta= $_POST['ciudadcEmpresaOferta'];
$direccioncEmpresaOferta = $_POST['direccioncEmpresaOferta'];
$modalidadEmpresaOferta = $_POST['modalidadEmpresaOferta'];
$requisitosEmpresaOferta= $_POST['requisitosEmpresaOferta'];
$salarioEmpresaOferta = $_POST['salarioEmpresaOferta'];
$dessalarioEmpresaOferta= $_POST['dessalarioEmpresaOferta'];
$descripcionEmpresaOferta = $_POST['descripcionEmpresaOferta'];
$aplicarEmpresaOferta= $_POST['aplicarEmpresaOferta'];
$finicioEmpresaOferta= $_POST['finicioEmpresaOferta'];
$ffinalEmpresaOferta= $_POST['ffinalEmpresaOferta'];

$query = "INSERT INTO `ofertas-empresas-formulario`(`nombreEmpresaOferta`, `actividadEmpresaOferta`, `direccionEmpresaOferta`, `correoEmpresaOferta`, `contactoEmpresaOferta`, `otrocontactoEmpresaOferta`, `cargoEmpresaOferta`, `contratoEmpresaOferta`, `jornadaEmpresaOferta`, `paiscEmpresaOferta`, `ciudadcEmpresaOferta`, `direccioncEmpresaOferta`, `modalidadEmpresaOferta`, `requisitosEmpresaOferta`, `salarioEmpresaOferta`, `dessalarioEmpresaOferta`, `descripcionEmpresaOferta`, `aplicarEmpresaOferta`, `finicioEmpresaOferta`, `ffinalEmpresaOferta`) VALUES ('$nombreEmpresaOferta1', '$actividadEmpresaOferta1', '$direccionEmpresaOferta1', '$correoEmpresaOferta1', '$contactoEmpresaOferta1', '$otrocontactoEmpresaOferta1', '$cargoEmpresaOferta', '$contratoEmpresaOferta', '$jornadaEmpresaOferta', '$paiscEmpresaOferta', '$ciudadcEmpresaOferta', '$direccioncEmpresaOferta', '$modalidadEmpresaOferta', '$requisitosEmpresaOferta', '$salarioEmpresaOferta', '$dessalarioEmpresaOferta', '$descripcionEmpresaOferta', '$aplicarEmpresaOferta', '$finicioEmpresaOferta', '$ffinalEmpresaOferta')";

if (mysqli_query($conexion, $query)) {
    echo "Los datos fueron guardados correctamente.";
} else {
    echo "Error al guardar los datos: " . mysqli_error($conexion);
}

// Cerrando la conexión
mysqli_close($conexion);
?>
