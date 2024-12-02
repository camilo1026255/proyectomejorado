<?php

// Configuración de la base de datos
$servername = "localhost"; // Cambia esto por el nombre del servidor
$username = "root";        // Cambia esto por el nombre de usuario de la base de datos
$password = "";            // Cambia esto por la contraseña de la base de datos
$dbname = "inventario";    // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $new_username = $_POST['username'];
    $new_password = $_POST['password'];
    $new_role = $_POST['role'];

    // Encriptar la contraseña usando SHA-256
    $hashed_password = hash('sha256', $new_password);

    // Insertar usuario
    $sql = "INSERT INTO usuarios (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $new_username, $hashed_password, $new_role);

    if ($stmt->execute()) {
        echo "Usuario añadido correctamente.";
    } else {
        echo "Error al añadir usuario: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
