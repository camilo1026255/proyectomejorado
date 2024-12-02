<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM Usuarios WHERE username = ? AND password = SHA2(?, 256)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    if ($row['role'] === 'admin') {
        header("Location: dashboard_admin.php");
    } elseif ($row['role'] === 'employee') {
        header("Location: dashboard_employee.php");
    }
    exit();
} else {
    echo "Usuario o contraseña incorrectos.";
}

$conn->close();
?>