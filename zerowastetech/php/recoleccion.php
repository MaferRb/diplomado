<?php
/**
 * Por medio de una clase en PHP se deben crear las siguientes funcionalidades:
 * 
 * 1. Insertar: Permitirá registrar los datos del usuario.
 * 2. Modificar: Permitirá actualizar los datos de un usuario.
 * 3. Listar: Permitirá listar los usuarios que están en la base de datos.
 * 4. Eliminar: Permitirá eliminar un usuario seleccionado.
 */
class Recoleccion {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        // Crear una conexión a la base de datos en el constructor
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Error de conexión: " . $this->conn->connect_error);
        }
    }

    public function insert($nombre, $apellidos, $email, $telefono, $direccion, $ciudad, $departamento, $codigoPostal, $comentarios, $aceptaPoliticas) {
        // Realizar la inserción de un nuevo usuario en la tabla
        $sql = "INSERT INTO recoleccion_dispositivos (nombre, apellidos, email, celular, direccion, ciudad, departamento, codigo_postal, comentarios, acepta_politicas)
                VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$direccion', '$ciudad', '$departamento', '$codigoPostal', '$comentarios', '$aceptaPoliticas')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        // Realizar una consulta para obtener la lista de usuarios
        $sql = "SELECT * FROM recoleccion_dispositivos";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $usuarios = array();

            while ($row = $result->fetch_assoc()) {
                $usuarios[] = $row;
            }

            return $usuarios;
        } else {
            return array();
        }
    }

    public function delete($id) {
        // Eliminar un usuario por su ID
        $sql = "DELETE FROM recoleccion_dispositivos WHERE id = $id";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function getId($id) {
        // Obtener un usuario por su ID
        $sql = "SELECT * FROM recoleccion_dispositivos WHERE id = $id";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function modify($id, $nombre, $apellidos, $email, $telefono, $direccion, $ciudad, $departamento, $codigoPostal, $comentarios, $aceptaPoliticas) {
        // Modificar los datos de un usuario
        $sql = "UPDATE recoleccion_dispositivos SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', celular = '$telefono', direccion = '$direccion', ciudad = '$ciudad', departamento = '$departamento', codigo_postal = '$codigoPostal', comentarios = '$comentarios', acepta_politicas = '$aceptaPoliticas' WHERE id = $id";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function close() {
        // Cerrar la conexión al finalizar
        $this->conn->close();
    }
}
?>
