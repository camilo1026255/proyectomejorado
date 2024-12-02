<?php
session_start();

// Regenerar el ID de sesión para prevenir ataques de fijación de sesión
session_regenerate_id(true);

// Verificar que el usuario está autenticado y tiene el rol de 'admin'
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Redirigir al inicio si no está autenticado o no es un administrador
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background: linear-gradient(120deg, #eef2f7, #dfe9f3);
            color: #333;
            line-height: 1.6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Header */
        h1 {
            color: #2d3e50;
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        p {
            margin-bottom: 20px;
            font-size: 1.2rem;
        }

        /* Lista de enlaces */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Botón de cierre de sesión */
        .logout {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>

<h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<p>Seleccione una tabla para gestionar:</p>
<ul>
    <li><a href="aux_bodega.php">Gestionar Aux Bodega</a></li>
    <li><a href="producto_terminado.php">Gestionar Producto Terminado</a></li>
    <li><a href="crear_usuarios.php">Agregar usuario</a></li>
    <li><a href="productos.php">Gestión de Productos</a></li>
    <li><a href="productos_realizados.php">Gestión Materia Prima</a></li>
</ul>

<a href="logout.php" class="logout">Cerrar Sesión</a>

</body>
</html>
