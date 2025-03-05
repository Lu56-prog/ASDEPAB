<?php
session_start();

//Guardar datos formulario 1
$_SESSION['nombreEmpresaOferta'] = $_POST['nombreEmpresaOferta'];
$_SESSION['actividadEmpresaOferta'] = $_POST['actividadEmpresaOferta'];
$_SESSION['direccionEmpresaOferta'] = $_POST['direccionEmpresaOferta'];
$_SESSION['correoEmpresaOferta'] = $_POST['correoEmpresaOferta'];
$_SESSION['contactoEmpresaOferta'] = $_POST['contactoEmpresaOferta'];
$_SESSION['otrocontactoEmpresaOferta'] = $_POST['otrocontactoEmpresaOferta'];

header("Location: /html/Pagina Trabajo (Pascual Work)/Empresa/Form2Empresa.html");
exit();
?>
