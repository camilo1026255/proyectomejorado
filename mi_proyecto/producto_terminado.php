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

// Verificar si se ha enviado el formulario de inserción
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['table']) && $_POST['table'] === 'Producto_Terminado') {
    // Insertar datos
    $Fecha_entrada = $_POST['Fecha_entrada'];
    $Fecha_Entrega = $_POST['Fecha_Entrega'];
    $Cantidad = $_POST['Cantidad'];
    $Tipo_Chaqueta = $_POST['Tipo_Chaqueta'];
    $Material_Sobrante = $_POST['Material_Sobrante'];

    $sql = "INSERT INTO Producto_Terminado (Fecha_entrada, Fecha_Entrega, Cantidad, Tipo_Chaqueta, Material_Sobrante)
            VALUES ('$Fecha_entrada', '$Fecha_Entrega', $Cantidad, '$Tipo_Chaqueta', '$Material_Sobrante')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro ingresado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
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

// Consultar todos los registros de Producto_Terminado
$sql = "SELECT * FROM Producto_Terminado";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso en Producto Terminado</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Ingreso de Datos en Producto Terminado</h1>

<!-- Formulario para ingresar datos en Producto_Terminado -->
<form action="insert.php" method="POST">

    <input type="hidden" name="table" value="Producto_Terminado">
    <label>Fecha de Entrada:</label>
    <input type="date" name="Fecha_entrada" required><br>
    <label>Fecha de Entrega:</label>
    <input type="date" name="Fecha_Entrega" required><br>
    <label>Cantidad:</label>
    <input type="number" name="Cantidad" required><br>
    <label>Tipo de Chaqueta:</label>
    <input type="text" name="Tipo_Chaqueta" required><br>
    <label>Material Sobrante:</label>
    <input type="text" name="Material_Sobrante" required><br>
    <button type="submit">Guardar en Producto Terminado</button>
</form>

<!-- Botón para regresar a la página principal -->
<button onclick="window.location.href='dashboard_admin.php'">Volver a la Página Principal</button>


<h2>Datos Almacenados en Producto Terminado</h2>

<table border="1" cellpadding="10" cellspacing="0" style="width: 80%; margin: auto; text-align: center;">
    <tr>
        <th>ID</th>
        <th>Fecha de Entrada</th>
        <th>Fecha de Entrega</th>
        <th>Cantidad</th>
        <th>Tipo de Chaqueta</th>
        <th>Material Sobrante</th>
        <th>Acciones</th>
    </tr>
    <?php
    // Mostrar los registros en la tabla

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Pro_Term_ID"] . "</td>";
            echo "<td>" . $row["Fecha_entrada"] . "</td>";
            echo "<td>" . $row["Fecha_Entrega"] . "</td>";
            echo "<td>" . $row["Cantidad"] . "</td>";
            echo "<td>" . $row["Tipo_Chaqueta"] . "</td>";
            echo "<td>" . $row["Material_Sobrante"] . "</td>";
            echo "<td>";
            // Enlace de editar
            echo "<a href='edit_producto_terminado.php?id=" . $row["Pro_Term_ID"] . "'>Editar</a> | ";
            // Enlace de eliminar
            echo "<a href='?delete=" . $row["Pro_Term_ID"] . "' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\");'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No hay registros.</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
