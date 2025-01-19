<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asdepab";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que todas las claves existen antes de usarlas
    if (
        isset($_POST['nombre']) &&
        isset($_POST['correo']) &&
        isset($_POST['telefono']) &&
        isset($_POST['passwordEgresado']) &&
        isset($_POST['graduacion']) &&
        isset($_POST['titulo'])
    ) {
        $nombreEgresado = $_POST['nombre'];
        $correoEgresado = $_POST['correo'];
        $telefonoEgresado = $_POST['telefono'];
        $passwordEgresado = password_hash($_POST['passwordEgresado'], PASSWORD_DEFAULT);
        $añograduacionEgresado = $_POST['graduacion'];
        $tituloEgresado = $_POST['titulo'];

    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
}

$conn->close();
?>
