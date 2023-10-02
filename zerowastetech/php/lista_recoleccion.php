<?php
/*
Este archivo PHP se utiliza para mostrar una lista de recolecciones almacenadas en la base de datos.

1. Incluye la clase 'Recoleccion' para interactuar con la base de datos y obtener los datos.
2. Configura la conexión a la base de datos utilizando parámetros como el servidor, nombre de usuario y contraseña.
3. Obtiene la lista de recolecciones a través de la instancia de la clase 'Recoleccion'.
4. Luego, muestra los datos en una tabla HTML con la opción de editar o eliminar cada recolección.
*/

// Incluye la clase Usuario
require_once('Recoleccion.php');

// Configura la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zero";

// Crea una instancia de la clase Usuario
$recoleccion = new Recoleccion($servername, $username, $password, $dbname);

// Obtiene la lista de usuarios
$recolecciones = $recoleccion->getAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Recolecciones</title>
</head>
<body>
    <!-- Mensaje de éxito -->
    <?php
    if (isset($_GET["exito"])) {
        $mensajeExito = $_GET["exito"];
        echo '<div class="alert alert-success">' . htmlspecialchars($mensajeExito) . '</div>';
    }
    ?>
    <h1>Lista de Recolecciones</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Direccion</th>
            <th>Ciudad</th>
            <th>Departamento</th>
            <th>Codigo Postal</th>
            <th>Comentarios</th>
            <!-- Agrega más columnas según tus necesidades -->
            <th>Acciones</th>
        </tr>
        <?php foreach ($recolecciones as $item) { ?>
            <tr>
                <td><?php echo $item['ID']; ?></td>
                <td><?php echo $item['nombre']; ?></td>
                <td><?php echo $item['apellidos']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['celular']; ?></td>
                <td><?php echo $item['direccion']; ?></td>
                <td><?php echo $item['ciudad']; ?></td>
                <td><?php echo $item['departamento']; ?></td>
                <td><?php echo $item['codigo_postal']; ?></td>
                <td><?php echo $item['comentarios']; ?></td>
                <!-- Agrega más columnas según tus necesidades -->
                <td>
                    <a href="editar_recoleccion.php?id=<?php echo $item['ID']; ?>">Editar</a> |
                    <a href="eliminar_recoleccion.php?id=<?php echo $item['ID']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
    // Cierra la conexión al finalizar
    $recoleccion->close();
?>
