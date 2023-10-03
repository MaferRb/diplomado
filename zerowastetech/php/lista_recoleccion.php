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

    <!--bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- LLAMADO DEL ARCHIVO CSS PURO -->
    <!--custom css-->
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
</head>
<body>
    <!-- Mensaje de éxito -->
    <?php
    if (isset($_GET["exito"])) {
        $mensajeExito = $_GET["exito"];
        echo '<div class="alert alert-success">' . htmlspecialchars($mensajeExito) . '</div>';
    }
    ?>
    <div class="container-fluid">
     <h1 class="text-success text-center font-weight-bold mt-3 mb-3">Lista de Recolecciones</h1>
        <table class="table table-bordered table-sm table table-hover">
            <tr class="table-success">
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Departamento</th>
                <th>Codigo Postal</th>
                <th>Comentarios</th>
                <!-- Agrega más columnas según tus necesidades -->
                <th>Acciones</th>
            </tr>
            <?php foreach ($recolecciones as $item) { ?>
                <tr class="table-light table table-hover">
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
   </div>    
 <!--bootstrap javascript-->

  <script type="text/javascript">
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script> 
</body>
</html>

<?php
    // Cierra la conexión al finalizar
    $recoleccion->close();
?>
