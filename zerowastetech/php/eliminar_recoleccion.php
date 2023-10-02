<?php
// Incluye la clase Recoleccion
require_once('Recoleccion.php');

// Configura la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zero";

// Crea una instancia de la clase Recoleccion
$recoleccion = new Recoleccion($servername, $username, $password, $dbname);

// Verifica si se ha enviado un ID válido por GET
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $recoleccion_id = $_GET["id"];

    // Intenta eliminar la recolección por su ID
    if ($recoleccion->delete($recoleccion_id)) {
        // Mensaje de éxito personalizado
        $mensajeExito = "Recolección eliminada con éxito.";
        // Redirige de nuevo a la página de lista de recolecciones si se ha eliminado con éxito
        header("Location: lista_recoleccion.php");
        exit();
    } else {
        // Muestra un mensaje de error si la eliminación falla
        echo "Error al eliminar la recolección.";
    }
} else {
    // Muestra un mensaje de error si no se proporciona un ID válido
    echo "ID de recolección no válido.";
}
?>
