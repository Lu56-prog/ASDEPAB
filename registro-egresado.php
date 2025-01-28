<?php
session_start();
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
    // Sanitizar y validar datos
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $tipo_documento = filter_var($_POST['tipodocumentoEgresado'], FILTER_SANITIZE_STRING);
    $identificacion = filter_var($_POST['identificacionEgresado'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
    $fecha_nacimiento = filter_var($_POST['nacimientoEgresado'], FILTER_SANITIZE_STRING);
    $titulo = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
    $password = $_POST['passwordEgresado'];

    // Validaciones básicas
    if (!$nombre || !$tipo_documento || !$identificacion || !$correo || !$telefono || !$fecha_nacimiento || !$titulo || !$password) {
        $_SESSION['error'] = "Todos los campos son obligatorios";
        header("Location: registro-egresado.html");
        exit();
    }

    // Verificar si el correo ya existe
    $stmt = $conn->prepare("SELECT id FROM egresados WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $_SESSION['error'] = "El correo ya está registrado";
        header("Location: registro-egresado.html");
        exit();
    }

    // Verificar si la identificación ya existe
    $stmt = $conn->prepare("SELECT id FROM egresados WHERE identificacion = ? AND tipo_documento = ?");
    $stmt->bind_param("ss", $identificacion, $tipo_documento);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $_SESSION['error'] = "La identificación ya está registrada";
        header("Location: registro-egresado.html");
        exit();
    }

    // Hash de la contraseña
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar nuevo egresado
    $stmt = $conn->prepare("INSERT INTO egresados (nombre, tipo_documento, identificacion, correo, telefono, fecha_nacimiento, titulo, passwordEgresado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nombre, $tipo_documento, $identificacion, $correo, $telefono, $fecha_nacimiento, $titulo, $password_hash);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Registro exitoso. Por favor inicie sesión.";
        header("Location: inicio-sesion.html");
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar: " . $conn->error;
        header("Location: registro-egresado.html");
        exit();
    }
}

$conn->close();
?>