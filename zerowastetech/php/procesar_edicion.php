<?php
// Verificar si se recibieron datos POST del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados desde el formulario
    $usuario_id = $_POST["usuario_id"];
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

    // Conectar a la base de datos (ajusta la configuración de conexión según tu entorno)
    $conexion = mysqli_connect("127.0.0.1", "root", "", "zero");

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Actualizar la información del usuario en la base de datos
    $sql_actualizar = "UPDATE recoleccion_dispositivos  SET
        nombre = '$nombre',
        apellido = '$apellido',
        email = '$email',
        celular = '$celular',
        direccion = '$direccion',
        ciudad = '$ciudad',
        departamento = '$departamento',
        codigo_postal = '$codigo_postal',
        comentarios = '$comentarios',
        politicas = $politicas
        WHERE id = $usuario_id";

    if (mysqli_query($conexion, $sql_actualizar)) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Redireccionar o mostrar un mensaje de error si se intenta acceder a este archivo directamente sin datos POST
    echo "Acceso no autorizado.";
}
?>
