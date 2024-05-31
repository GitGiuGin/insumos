<?php
// Este es tu controlador que maneja la solicitud del formulario
include '../db/conn.php';
include '../logic/Usuario.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el formulario se envió para actualizar
    if (isset($_POST['actualizar'])) {
        // Recuperar el ID del formulario
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $num_documento = $_POST['num_documento'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];


        // Crear una instancia de la clase Usuario
        $usuario = new Usuario($conn);

        // Llamar al método actualizar con el ID
        $usuario->actualizar($id, $nombre, $apellido, $num_documento, $telefono, $direccion, $correo, $contrasena);
        header("Location: /ruta/especifica");
        exit();
    }
}
