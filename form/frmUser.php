<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
</head>
<body>
    <?php
        include '../logic/Usuario.php';
        include '../db/conn.php';
        $id = $_GET['id']; // Obtiene el ID de la URL
        $usuario = new Usuario($conn);
        $res = $usuario->btnEditar($id); // Llama al método btnEditar con el ID obtenido
    ?>

    <h2>Actualizar Información del Usuario</h2>
    <form action="../index.php" method="post">

        <input type="hidden" id="id" name="id" value="<?php echo $res["id"]; ?>">
  
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $res["nombre"]; ?>"><br><br>
        
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $res["apellido"]; ?>"><br><br>

        <label for="rol">Rol:</label>
        <input type="text" id="rol" name="rol" value="<?php echo $res["rol"]; ?>"><br><br>
        
        <label for="num_documento">Número de Documento:</label>
        <input type="text" id="num_documento" name="num_documento" value="<?php echo $res["num_documento"]; ?>"><br><br>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $res["telefono"]; ?>"><br><br>
        
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $res["direccion"]; ?>"><br><br>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $res["correo"]; ?>"><br><br>
        
        <label for="contrasena">Contraseña:</label>
        <input type="text" id="contrasena" name="contrasena" value="<?php echo $res["contrasena"]; ?>"><br><br>
        
        <input type="submit" name="actualizar" value="Actualizar">
        <?php
            $rol = $res["rol"];
            $nombre = $res["nombre"];
            $apellido = $res["apellido"];
            $num_documento = $res["num_documento"];
            $telefono = $res["telefono"];
            $direccion = $res["direccion"];
            $correo = $res["correo"];
            $contrasena = $res["contrasena"];

            $usuario->actualizar($id, $nombre, $apellido, $num_documento, $telefono, $direccion, $correo, $contrasena);
        ?>

    </form>
</body>
</html>