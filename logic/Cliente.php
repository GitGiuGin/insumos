<?php

class Usuario
{

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function consultar()
    {
        include 'db/conn.php';
        $sql = "SELECT u.id, r.nombre AS rol, u.nombre, u.apellido, u.num_documento, u.telefono, u.direccion, u.correo, u.contrasena
                FROM usuario u JOIN rol r
                ON u.id_rol = r.id
                ORDER BY u.id ASC";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
?>
            <table border="1">
                <tr>
                    <th><?php echo "ID"; ?></th>
                    <th><?php echo "Rol"; ?></th>
                    <th><?php echo "Nombre"; ?></th>
                    <th><?php echo "Apellido"; ?></th>
                    <th><?php echo "Documento"; ?></th>
                    <th><?php echo "Teléfono"; ?></th>
                    <th><?php echo "Dirección"; ?></th>
                    <th><?php echo "Correo"; ?></th>
                    <th><?php echo "Contraseña"; ?></th>
                    <th><?php echo "Accion 1"; ?></th>
                    <th><?php echo "Accion 2"; ?></th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["rol"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["apellido"]; ?></td>
                        <td><?php echo $row["num_documento"]; ?></td>
                        <td><?php echo $row["telefono"]; ?></td>
                        <td><?php echo $row["direccion"]; ?></td>
                        <td><?php echo $row["correo"]; ?></td>
                        <td><?php echo $row["contrasena"]; ?></td>
                        <td>
                            <a href='form/frmUser.php?id=<?php echo $row["id"]; ?>'>Editar</a>
                        </td>
                        </td>
                        <td>
                            <a href='index.php?id=<?php echo $row["id"]; ?>'>Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
<?php
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    public function agregar($rol, $nombre, $apellido, $num_documento, $telefono, $direccion, $correo, $contrasena)
    {
        include 'db/conn.php';

        try {
            // Preparar la consulta SQL para insertar un nuevo usuario
            $stmt = $this->conn->prepare("INSERT INTO usuario (id_rol, nombre, apellido, num_documento, telefono, direccion, correo, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

            // Enlazar parámetros con valores
            $stmt->bind_param("isssssss", $rol, $nombre, $apellido, $num_documento, $telefono, $direccion, $correo, $contrasena);

            // Ejecutar la consulta preparada
            if ($stmt->execute() === TRUE) {
                echo "Nuevo usuario creado exitosamente";
            } else {
                throw new Exception("Error al crear el usuario: " . $this->conn->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        // Cerrar la conexión
        $this->conn->close();
    }

    public function btnEditar($id)
    {
        include '../db/conn.php';

        $sql = "SELECT u.id, r.nombre AS rol, u.nombre, u.apellido, u.num_documento, u.telefono, u.direccion, u.correo, u.contrasena
        FROM usuario u JOIN rol r
        ON u.id_rol = r.id 
        WHERE u.id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id); // "i" indica que $id es un entero
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        return $res;
    }

    /*ESTA EN PRUEBA ESTE METODO */
    public function actualizar($id, $nombre, $apellido, $num_documento, $telefono, $direccion, $correo, $contrasena) {
        include 'db/conn.php';
        
        try {
            // Actualizar la información del usuario en la base de datos
            $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', num_documento='$num_documento', telefono='$telefono', direccion='$direccion', correo='$correo', contrasena='$contrasena' WHERE id=$id";
            
            if ($conn->query($sql) === TRUE) {
                echo "Registro actualizado correctamente";
                
            } else {
                throw new Exception("Error al actualizar el registro: " . $conn->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    
        $conn->close();
    }

    /*ESTA EN PRUEBA ESTE METODO*/
    public function eliminar($id)
    {
        include 'db/conn.php';

        try {
            // Consulta SQL para eliminar el usuario
            $sql = "DELETE FROM usuario WHERE id = ?";

            // Preparar la consulta
            $stmt = $this->conn->prepare($sql);

            // Enlazar parámetro ID
            $stmt->bind_param("i", $id);

            // Ejecutar la consulta
            if ($stmt->execute() === TRUE) {
                echo "Usuario eliminado exitosamente";
            } else {
                throw new Exception("Error al eliminar el usuario: " . $this->conn->error);
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        // Cerrar la conexión
        $this->conn->close();
    }
}
?>