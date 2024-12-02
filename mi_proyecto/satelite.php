<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso en Satelite</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Ingreso de Datos en Satelite</h1>

<!-- Formulario para ingresar datos en Satelite -->
<form action="insert.php" method="POST">
    <input type="hidden" name="table" value="Satelite">
    <label>Material Descripción:</label>
    <input type="text" name="Material_Descripcion" required><br>
    <label>Material Cantidad:</label>
    <input type="number" name="Material_Cantidad" required><br>
    <label>Tipo de Material:</label>
    <input type="text" name="Tipo_Material" required><br>
    <label>Fecha de Entrada:</label>
    <input type="date" name="Fecha_Entrada" required><br>
    <label>Fecha de Salida:</label>
    <input type="date" name="Fecha_Salida" required><br>
    <label>ID de Producto Terminado:</label>
    <input type="number" name="Pro_Term_id" required><br>
    <button type="submit">Guardar en Satelite</button>
</form>

<!-- Botón para regresar a la página principal -->
<button onclick="window.location.href='producto_terminado.php'">Volver a la Página Principal</button>

</body>
</html>
