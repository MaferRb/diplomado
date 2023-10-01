<?php
// Conexión a la base de datos
$servername = "127.0.0.1"; // Cambia esto por el nombre de tu servidor MySQL
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$dbname = "zero"; // Cambia esto por el nombre de tu base de datos

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recuperar datos del formulario
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$celular = $_POST["celular"];
$direccion = $_POST["direccion"];
$ciudad = $_POST["ciudad"];
$departamento = $_POST["departamento"];
$codigoPostal = $_POST["codigo_postal"];
$comentarios = $_POST["comentarios"];
$aceptaPoliticas = isset($_POST["politicas"]) ? 1 : 0; // Verifica si se marcó la casilla de políticas

// Insertar los datos en la tabla
$sql = "INSERT INTO recoleccion_dispositivos (nombre, apellidos, email, celular, direccion, ciudad, departamento, codigo_postal, comentarios, acepta_politicas) VALUES ('$nombre', '$apellidos', '$email', '$celular', '$direccion', '$ciudad', '$departamento', '$codigoPostal', '$comentarios', '$aceptaPoliticas')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso. ¡Gracias por programar la recogida!";
} else {
    echo "Error al registrar: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>