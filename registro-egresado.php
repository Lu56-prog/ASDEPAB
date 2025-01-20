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
    $nombreEgresado = $_POST['nombre'];
    $correoEgresado = $_POST['correo'];
    $telefonoEgresado = $_POST['telefono'];
    $passwordEgresado = password_hash($_POST['passwordEgresado'], PASSWORD_DEFAULT);
    $añograduacionEgresado = $_POST['graduacion'];
    $tituloEgresado = $_POST['titulo'];

    $sql = "INSERT INTO egresados (nombre, correo, telefono, passwordEgresado, graduacion, titulo) VALUES ('$nombreEgresado', '$correoEgresado', '$telefonoEgresado', '$passwordEgresado', '$añograduacionEgresado', '$tituloEgresado')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de egresado exitoso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>