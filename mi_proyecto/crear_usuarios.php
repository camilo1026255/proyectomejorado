<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
    <h1>Agregar Nuevo Usuario</h1>
    <form action="add_user.php" method="post">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="role">Rol:</label>
        <select id="role" name="role">
            <option value="employee">Empleado</option>
            <option value="admin">Administrador</option>
        </select><br><br>
        
        <button type="submit">Agregar Usuario</button>
    </form>
</body>
</html>
