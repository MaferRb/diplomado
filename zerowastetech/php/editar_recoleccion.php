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
    <div class="container">
        <h1 class="form text-success text-center font-weight-bold mt-3 mb-3">Editar Recoleccion</h1>

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
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $resultado["nombre"] ?>">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" value="<?php echo $resultado["apellidos"]; ?>">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo $resultado["email"]; ?>">
            </div>

            <div class="form-group">
                <label for="celular">Número de Celular:</label>
                <input type="tel" id="celular" name="celular" class="form-control" value="<?php echo $resultado["celular"]; ?>">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $resultado["direccion"]; ?>">
            </div>

            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" class="form-control" value="<?php echo $resultado["ciudad"]; ?>">
            </div>

            <div class="form-group">
                <label for="departamento">Departamento:</label>
                <input type="text" id="departamento" name="departamento" class="form-control" value="<?php echo $resultado["departamento"]; ?>">
            </div>

            <div class="form-group">
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" id="codigo_postal" name="codigo_postal" class="form-control" value="<?php echo $resultado["codigo_postal"]; ?>">
            </div>

            <div class="form-group">
                <label for="comentarios">Comentarios:</label>
                <textarea id="comentarios" name="comentarios" class="form-control"><?php echo $resultado["comentarios"]; ?></textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" id="politicas" name="politicas" class="form-check-input" <?php if ($resultado["acepta_politicas"] == 1) echo "checked"; ?>>
                <label class="form-check-label" for="politicas">Acepto las políticas de la empresa</label>
            </div>

            <div class="button-container">
                <button class="btn btn-success" type="submit">Guardar Cambios</button>
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