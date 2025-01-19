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
    $nombreEmpresa = $_POST['nombreEmpresa'];
    $nitEmpresa = $_POST['nitEmpresa'];
    $direccionEmpresa = $_POST['direccionEmpresa'];
    $telefonoEmpresa = $_POST['telefonoEmpresa'];
    $emailEmpresa = $_POST['emailEmpresa'];
    $sectorEmpresa = $_POST['sectorEmpresa'];
    $empleadosEmpresa = $_POST['empleadosEmpresa'];
    $passwordEmpresa = password_hash($_POST['passwordEmpresa'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO empresas (nombre, nit, direccion, telefono, email, sector, empleados, passwordEmpresa) VALUES ('$nombreEmpresa', '$nitEmpresa', '$direccionEmpresa', '$telefonoEmpresa', '$emailEmpresa', '$sectorEmpresa', '$empleadosEmpresa', '$passwordEmpresa')";	

    if ($conn->query($sql) === TRUE) {
        echo "Registro de empresa exitoso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>