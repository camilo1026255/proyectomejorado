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

// Obtener el ID del registro a editar
$id = intval($_GET['id']);

// Consultar los datos actuales
$result = $conn->query("SELECT * FROM aux_bodega WHERE ID_AuxBodega = $id");
$data = $result->fetch_assoc();

// Actualizar los datos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $tipo_material = $conn->real_escape_string($_POST['tipo_material']);
    $unidad_medida = intval($_POST['unidad_medida']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $stock_disponible = intval($_POST['stock_disponible']);
    $precio_rollo = intval($_POST['precio_rollo']);

    $conn->query("UPDATE aux_bodega SET 
        nombre = '$nombre',
        tipo_material = '$tipo_material',
        unidad_medida = $unidad_medida,
        fecha = '$fecha',
        stock_disponible = $stock_disponible,
        precio_rollo = $precio_rollo
        WHERE ID_AuxBodega = $id
    ");

    header("Location: aux_bodega.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aux Bodega</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Editar Registro de Aux Bodega</h1>

<!-- Formulario para editar los datos -->
<form method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($data['nombre']); ?>" required><br>
    <label>Tipo de Material:</label>
    <input type="text" name="tipo_material" value="<?= htmlspecialchars($data['tipo_material']); ?>" required><br>
    <label>Unidad de Medida:</label>
    <input type="number" name="unidad_medida" value="<?= htmlspecialchars($data['unidad_medida']); ?>" required><br>
    <label>Fecha:</label>
    <input type="date" name="fecha" value="<?= htmlspecialchars($data['fecha']); ?>" required><br>
    <label>Stock Disponible:</label>
    <input type="number" name="stock_disponible" value="<?= htmlspecialchars($data['stock_disponible']); ?>" required><br>
    <label>Precio por Rollo:</label>
    <input type="number" name="precio_rollo" value="<?= htmlspecialchars($data['precio_rollo']); ?>" required><br>
    <button type="submit">Guardar Cambios</button>
</form>

<!-- Botón para cancelar -->
<button onclick="window.location.href='aux_bodega.php'" style="margin-top: 20px;">Cancelar</button>

</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>
