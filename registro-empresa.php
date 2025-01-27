<?php
// Iniciar sesión para manejar estados
session_start();

// Configuración de la base de datos
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

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y validar entradas
    $nombreEmpresa = filter_var(trim($_POST['nombreEmpresa']), FILTER_SANITIZE_STRING);
    $nitEmpresa = filter_var(trim($_POST['nitEmpresa']), FILTER_SANITIZE_NUMBER_INT);
    $passwordEmpresa = password_hash($_POST['passwordEmpresa'], PASSWORD_DEFAULT);
    $actividadEmpresa = filter_var(trim($_POST['actividadEmpresa']), FILTER_SANITIZE_STRING);
    $entidadEmpresa = filter_var(trim($_POST['entidadEmpresa']), FILTER_SANITIZE_STRING);
    $paisEmpresa = filter_var(trim($_POST['paisEmpresa']), FILTER_SANITIZE_STRING);
    $ciudadEmpresa = filter_var(trim($_POST['ciudadEmpresa']), FILTER_SANITIZE_STRING);
    $direccionEmpresa = filter_var(trim($_POST['direccionEmpresa']), FILTER_SANITIZE_STRING);
    $celularEmpresa = filter_var(trim($_POST['celularEmpresa']), FILTER_SANITIZE_STRING);
    $telefonoEmpresa = !empty($_POST['telefonoEmpresa']) ? filter_var(trim($_POST['telefonoEmpresa']), FILTER_SANITIZE_STRING) : null;
    $emailEmpresa = filter_var(trim($_POST['emailEmpresa']), FILTER_SANITIZE_EMAIL);
    $descripcionEmpresa = filter_var(trim($_POST['descripcionEmpresa']), FILTER_SANITIZE_STRING);

    // Validar email
    if (!filter_var($emailEmpresa, FILTER_VALIDATE_EMAIL)) {
        die("Error: Correo electrónico inválido");
    }

    // Manejo de la imagen (si se proporcionó)
    $imagenPath = null;
    if (isset($_FILES['imagenEmpresa']) && $_FILES['imagenEmpresa']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png'];
        $filename = $_FILES['imagenEmpresa']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        
        if (in_array(strtolower($filetype), $allowed)) {
            $newFilename = uniqid() . '.' . $filetype;
            $uploadPath = 'uploads/' . $newFilename;
            
            if (move_uploaded_file($_FILES['imagenEmpresa']['tmp_name'], $uploadPath)) {
                $imagenPath = $uploadPath;
            }
        }
    }

    // Preparar la consulta SQL usando prepared statements
    $sql = "INSERT INTO empresas (
        nombre, 
        nit, 
        password,
        actividad_principal,
        tipo_entidad,
        pais,
        ciudad,
        direccion,
        celular,
        telefono,
        email,
        descripcion,
        imagen_perfil
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Preparar y vincular parámetros
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", 
        $nombreEmpresa,
        $nitEmpresa,
        $passwordEmpresa,
        $actividadEmpresa,
        $entidadEmpresa,
        $paisEmpresa,
        $ciudadEmpresa,
        $direccionEmpresa,
        $celularEmpresa,
        $telefonoEmpresa,
        $emailEmpresa,
        $descripcionEmpresa,
        $imagenPath
    );

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Registro exitoso";
        header("Location: registro-exitoso.html");
        exit();
    } else {
        $_SESSION['error'] = "Error en el registro: " . $stmt->error;
        header("Location: registro-empresa.html");
        exit();
    }

    // Cerrar el statement
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>