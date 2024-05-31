<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>User List</h2>
    <a href="test.php">Add New User</a>
    <br><br>
    <?php include 'logic/Usuario.php';
    include 'db/conn.php';
    $usuario = new Usuario($conn);
    $usuario->consultar();

    $rol = 2; // Suponiendo que 1 es el ID del rol que deseas asignar al nuevo usuario
    $nombre = "Carlos";
    $apellido = "Mamani";
    $num_documento = "456";
    $telefono = "76230230";
    $direccion = "123 Main St";
    $correo = "carlos.mamani@gmail.com";
    $contrasena = "password123";

    $usuario->agregar($rol, $nombre, $apellido, $num_documento, $telefono, $direccion, $correo, $contrasena);
    ?>


</body>
</html>