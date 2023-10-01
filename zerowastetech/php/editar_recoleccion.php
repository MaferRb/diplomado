<?php
/*
Este archivo PHP permite editar la información de una recolección en la base de datos.
Incluye la clase 'Recoleccion', configura la conexión a la base de datos y muestra un formulario de edición.
El formulario envía datos a '../php/editar_recoleccion.php' para procesar los cambios.
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

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar recoleccion</title>
    <!-- Agregar enlaces a tus archivos CSS y JavaScript aquí, si los tienes -->
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
    <div class="container formulario-container">
        <h1 class="form text-success font-weight-bold">Editar Recoleccion</h1>

        <?php
       
        // Obtener el ID del usuario a editar, por ejemplo, a través de GET
        $recoleccion_id = $_GET["id"];

        // Realizar una consulta SQL para obtener la información del usuario
        $resultado = $recoleccion->getId($recoleccion_id);

        if (!$resultado)  {
            echo "Usuario no encontrado.";
            exit; // Detener la ejecución del script si el usuario no se encuentra
        }else {
           // print_r(array_keys($resultado));
           // echo implode(" ",$resultado);
        }

        // Procesar los datos del formulario cuando se envía
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener y actualizar los datos del usuario desde el formulario
            $ID = $_GET["id"]; //$_POST["ID"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $celular = $_POST["celular"];
            $direccion = $_POST["direccion"];
            $ciudad = $_POST["ciudad"];
            $departamento = $_POST["departamento"];
            $codigo_postal = $_POST["codigo_postal"];
            $comentarios = $_POST["comentarios"];
            $politicas = isset($_POST["politicas"]) ? 1 : 0; // Marcar como aceptadas si se selecciona
            
            // Actualizar la información del usuario en la base de datos
            

            if ($recoleccion->modify($ID, $nombre, $apellido, $email, $celular, $direccion, $ciudad, $departamento, $codigo_postal, $comentarios, $politicas)) {
                echo "Recoleccion actualizada con éxito.";
                exit;
            } else {
                echo "Error al actualizar la recoleccion.";
            }
        }
        ?>

        <form method="POST" action="../php/editar_recoleccion.php?id=<?php echo $resultado["ID"] ?>">
            <input type="hidden" id="ID" name="ID" value="<?php echo $resultado["ID"] ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $resultado["nombre"] ?>">
            <br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo $resultado["apellidos"]; ?>">
            <br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo $resultado["email"]; ?>">
            <br>

            <label for="celular">Número de Celular:</label>
            <input type="tel" id="celular" name="celular" value="<?php echo $resultado["celular"]; ?>">
            <br>

            <label for="direccion">Dirección:</label>
            <input class="formulario-container" type="text" id="direccion" name="direccion" value="<?php echo $resultado["direccion"]; ?>">
            <br>

            <label for="ciudad">Ciudad:</label>
            <input class="formulario-container" type="text" id="ciudad" name="ciudad" value="<?php echo $resultado["ciudad"]; ?>">
            <br>

            <label for="departamento">Departamento:</label>
            <input class="formulario-container" type="text" id="departamento" name="departamento" value="<?php echo $resultado["departamento"]; ?>">
            <br>

            <label for="codigo_postal">Código Postal:</label>
            <input class="formulario-container" type="text" id="codigo_postal" name="codigo_postal" value="<?php echo $resultado["codigo_postal"]; ?>">
            <br>

            <label for="comentarios">Comentarios:</label>
            <textarea class="formulario-container" id="comentarios" name="comentarios"><?php echo $resultado["comentarios"]; ?></textarea>
            <br>

            <label for="politicas">Acepto las políticas de la empresa:</label>
            <input class="formulario-container" type="checkbox" id="politicas" name="politicas" <?php if ($resultado["acepta_politicas"] == 1) echo "checked"; ?>>
            <br>
            <div class="button-container">
            <button class="formulario-container" type="submit">Guardar Cambios</button>
            </div>
        </form>
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