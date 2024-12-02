<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso en Aux Bodega</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Ingreso de Datos en Aux Bodega</h1>

<!-- Formulario para ingresar datos en Aux_Bodega -->
<form action="insert.php" method="POST">
    <input type="hidden" name="table" value="Aux_Bodega">
    <label>Nombre:</label>
    <input type="text" name="nombre" required><br>
    <label>Tipo de Material:</label>
    <input type="text" name="tipo_material" required><br>
    <label>Unidad de Medida:</label>
    <input type="number" name="unidad_medida" required><br>
    <label>Fecha:</label>
    <input type="date" name="fecha" required><br>
    <label>Stock Disponible:</label>
    <input type="number" name="stock_disponible" required><br>
    <label>Precio por Rollo:</label>
    <input type="number" name="precio_rollo" required><br>
    <button type="submit" onclick="location.reload();">Guardar en Aux_Bodega</button>

</form>

<!-- Botón para regresar a la página principal -->
<button onclick="window.location.href='dashboard_admin.php'">Volver a la Página Principal</button>

<?php
// Conexión a la base de datos
$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbname = 'inventario';

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Borrar registro si se recibe la solicitud
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM aux_bodega WHERE ID_AuxBodega = $id");
    header("Location: aux_bodega.php");
    exit();
}

// Obtener los datos de la tabla aux_bodega
$result = $conn->query("SELECT * FROM aux_bodega");
?>

<!-- Mostrar datos en tabla -->
<h2>Datos Almacenados en Aux Bodega</h2>
<table border="1" cellpadding="10" cellspacing="0" style="width: 80%; margin: auto; text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Tipo de Material</th>
            <th>Unidad de Medida</th>
            <th>Fecha</th>
            <th>Stock Disponible</th>
            <th>Precio por Rollo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['ID_AuxBodega']); ?></td>
                <td><?= htmlspecialchars($row['nombre']); ?></td>
                <td><?= htmlspecialchars($row['tipo_material']); ?></td>
                <td><?= htmlspecialchars($row['unidad_medida']); ?></td>
                <td><?= htmlspecialchars($row['fecha']); ?></td>
                <td><?= htmlspecialchars($row['stock_disponible']); ?></td>
                <td><?= htmlspecialchars($row['precio_rollo']); ?></td>
                <td>
                    <a href="edit_aux_bodega.php?id=<?= $row['ID_AuxBodega']; ?>">Editar</a> |
                    <a href="?delete=<?= $row['ID_AuxBodega']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este registro?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>




</body>
</html>
