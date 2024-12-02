<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Eliminar un registro
if (isset($_GET['delete'])) {
    $id_to_delete = $_GET['delete'];
    $delete_sql = "DELETE FROM Producto_Terminado WHERE Pro_Term_ID = $id_to_delete";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error: " . $delete_sql . "<br>" . $conn->error;
    }
}

// Consultar un solo registro para editar
if (isset($_GET['id'])) {
    $Pro_Term_ID = $_GET['id'];
    $edit_sql = "SELECT * FROM Producto_Terminado WHERE Pro_Term_ID = $Pro_Term_ID";
    $edit_result = $conn->query($edit_sql);

    if ($edit_result->num_rows > 0) {
        $edit_row = $edit_result->fetch_assoc();
    } else {
        echo "Registro no encontrado.";
        exit();
    }
}

// Actualizar un registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Pro_Term_ID'])) {
    $Pro_Term_ID = $_POST['Pro_Term_ID'];
    $Fecha_entrada = $_POST['Fecha_entrada'];
    $Fecha_Entrega = $_POST['Fecha_Entrega'];
    $Cantidad = $_POST['Cantidad'];
    $Tipo_Chaqueta = $_POST['Tipo_Chaqueta'];
    $Material_Sobrante = $_POST['Material_Sobrante'];

    $update_sql = "UPDATE Producto_Terminado SET 
                    Fecha_entrada = '$Fecha_entrada', 
                    Fecha_Entrega = '$Fecha_Entrega', 
                    Cantidad = $Cantidad, 
                    Tipo_Chaqueta = '$Tipo_Chaqueta', 
                    Material_Sobrante = '$Material_Sobrante'
                    WHERE Pro_Term_ID = $Pro_Term_ID";

    if ($conn->query($update_sql) === TRUE) {
        echo "Registro actualizado correctamente.";
        header("Location: edit_producto_terminado.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto Terminado</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- Si estamos editando un registro -->
<?php if (isset($edit_row)): ?>
    <h1>Editar Producto Terminado</h1>
    <form action="edit_producto_terminado.php" method="POST">
        <input type="hidden" name="Pro_Term_ID" value="<?php echo $edit_row['Pro_Term_ID']; ?>">
        <label>Fecha de Entrada:</label>
        <input type="date" name="Fecha_entrada" value="<?php echo $edit_row['Fecha_entrada']; ?>" required><br>
        <label>Fecha de Entrega:</label>
        <input type="date" name="Fecha_Entrega" value="<?php echo $edit_row['Fecha_Entrega']; ?>" required><br>
        <label>Cantidad:</label>
        <input type="number" name="Cantidad" value="<?php echo $edit_row['Cantidad']; ?>" required><br>
        <label>Tipo de Chaqueta:</label>
        <input type="text" name="Tipo_Chaqueta" value="<?php echo $edit_row['Tipo_Chaqueta']; ?>" required><br>
        <label>Material Sobrante:</label>
        <input type="text" name="Material_Sobrante" value="<?php echo $edit_row['Material_Sobrante']; ?>" required><br>
        <button type="submit">Actualizar Registro</button>
    </form>
<?php endif; ?>

<!-- Botón para regresar a la página principal -->
<button onclick="window.location.href='producto_terminado.php'">Volver a la Página Principal</button>


</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
