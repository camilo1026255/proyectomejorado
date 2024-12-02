<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/stylessebas.css">
</head>
<body>

<h1>Iniciar Sesión</h1>
<form action="auth.php" method="POST">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username" required><br>
    
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>

    <!-- Desplegable de roles -->
    <label for="role">Rol:</label>
    <select id="role" name="role" required>
        <option value="admin">Administrador</option>
        <option value="user">Empleado</option>
        
    </select><br>

    <button type="submit">Iniciar Sesión</button>
</form>



</body>
</html>
