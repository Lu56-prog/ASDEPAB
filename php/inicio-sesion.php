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
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    
    if (!$email || !$password) {
        die("Por favor complete todos los campos");
    }

    // Preparar consulta para egresados
    $stmt = $conn->prepare("SELECT id, nombre, passwordEgresado FROM egresados WHERE correo = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passwordEgresado'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_type'] = 'egresado';
            $_SESSION['user_name'] = $row['nombre'];
            header("Location: dashboard-egresado.php");
            exit();
        }
    } else {
        // Verificar empresas
        $stmt = $conn->prepare("SELECT id, nombre, passwordEmpresa FROM empresas WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['passwordEmpresa'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_type'] = 'empresa';
                $_SESSION['user_name'] = $row['nombre'];
                header("Location: dashboard-empresa.php");
                exit();
            }
        }
    }
    
    // Si llegamos aquí, las credenciales son incorrectas
    $_SESSION['error'] = "Correo o contraseña incorrectos";
    header("Location: inicio-sesion.html");
    exit();
}

$conn->close();
?>