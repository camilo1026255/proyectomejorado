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

// Determinar la tabla y preparar la consulta SQL
$table = $_POST['table'];
$sql = "";

if ($table === "Aux_Bodega") {
    $nombre = $_POST['nombre'];
    $tipo_material = $_POST['tipo_material'];
    $unidad_medida = $_POST['unidad_medida'];
    $fecha = $_POST['fecha'];
    $stock_disponible = $_POST['stock_disponible'];
    $precio_rollo = $_POST['precio_rollo'];
    
    $sql = "INSERT INTO Aux_Bodega (nombre, tipo_material, unidad_medida, fecha, stock_disponible, precio_rollo)
            VALUES ('$nombre', '$tipo_material', $unidad_medida, '$fecha', $stock_disponible, $precio_rollo)";
} elseif ($table === "Producto_Terminado") {
    $Fecha_entrada = $_POST['Fecha_entrada'];
    $Fecha_Entrega = $_POST['Fecha_Entrega'];
    $Cantidad = $_POST['Cantidad'];
    $Tipo_Chaqueta = $_POST['Tipo_Chaqueta'];
    $Material_Sobrante = $_POST['Material_Sobrante'];
    
    $sql = "INSERT INTO Producto_Terminado (Fecha_entrada, Fecha_Entrega, Cantidad, Tipo_Chaqueta, Material_Sobrante)
            VALUES ('$Fecha_entrada', '$Fecha_Entrega', $Cantidad, '$Tipo_Chaqueta', '$Material_Sobrante')";
} elseif ($table === "Satelite") {
    $Material_Descripcion = $_POST['Material_Descripcion'];
    $Material_Cantidad = $_POST['Material_Cantidad'];
    $Tipo_Material = $_POST['Tipo_Material'];
    $Fecha_Entrada = $_POST['Fecha_Entrada'];
    $Fecha_Salida = $_POST['Fecha_Salida'];
    $Pro_Term_id = $_POST['Pro_Term_id'];
    
    $sql = "INSERT INTO Satelite (Material_Descripcion, Material_Cantidad, Tipo_Material, Fecha_Entrada, Fecha_Salida, Pro_Term_id)
            VALUES ('$Material_Descripcion', $Material_Cantidad, '$Tipo_Material', '$Fecha_Entrada', '$Fecha_Salida', $Pro_Term_id)";
}

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Registro ingresado correctamente en la tabla $table";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
