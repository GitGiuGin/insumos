<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'insumos');

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta SQL para buscar al usuario
$sql = "SELECT * FROM usuario WHERE correo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    // Verificar la contraseña
    if (password_verify($password, $fila['contrasena'])) {
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['id'] = $fila['id'];
        header("Location: dashboard.php"); // Redirigir al panel principal
        exit();
    } else {
        // Contraseña incorrecta
        header("Location: login.php?error=Contraseña incorrecta");
        exit();
    }
} else {
    // Usuario no encontrado
    header("Location: login.php?error=Usuario no encontrado");
    exit();
}

// Actualizar la contraseña de un usuario
$nueva_contrasena = password_hash("contraseña_segura", PASSWORD_DEFAULT);
$sql = "UPDATE usuario SET contrasena = ? WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $nueva_contrasena, $id_usuario);
$stmt->execute();

// Cerrar la conexión
$conexion->close();