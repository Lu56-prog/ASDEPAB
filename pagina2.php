<?php
$conexion = mysqli_connect("localhost", "root", "", "base1") 
  or die("Problemas con la conexión");

// Verificar que $_POST contenga datos
if (!isset($_POST['nombre'], $_POST['mail'], $_POST['codigocurso'])) {
  die("Error: Faltan datos en el formulario.");
}

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$codigocurso = (int) $_POST['codigocurso']; // Convertir a número para evitar SQL Injection

$query = "INSERT INTO alumnos (nombre, mail, codigocurso) 
          VALUES ('$nombre', '$mail', $codigocurso)";

// Verificar si la consulta tiene errores
if (!mysqli_query($conexion, $query)) {
  die("Error en la consulta: " . mysqli_error($conexion));
}

mysqli_close($conexion);

echo "El alumno fue dado de alta.";
?>