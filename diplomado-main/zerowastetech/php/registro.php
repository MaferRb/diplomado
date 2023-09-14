// Crea un archivo registro.php que contendrá el formulario de registro.
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form action="procesar_registro.php" method="post">
        <!-- Campos de registro: nombre de usuario, clave, nombre, apellidos, correo -->
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="clave">Clave:</label>
        <input type="password" id="clave" name="clave" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br>
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
