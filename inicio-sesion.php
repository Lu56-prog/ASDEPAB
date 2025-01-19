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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el usuario es un egresado
    $sql = "SELECT * FROM egresados WHERE correo='$correoEgresado'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($passwordEgresado, $row['password'])) {
            echo "Inicio de sesión exitoso como egresado!";
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    } else {
        // Verificar si el usuario es una empresa
        $sql = "SELECT * FROM empresas WHERE email='$emailEmpresa'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($passwordEmpresa, $row['password'])) {
                echo "Inicio de sesión exitoso como empresa!";
            } else {
                echo "Correo o contraseña incorrectos.";
            }
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    }
}

$conn->close();
?>