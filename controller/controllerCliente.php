<?php
    
    // Incluir el archivo que contiene la definición de la clase
    require_once 'logic/Cliente.php';
    
    // Crear una instancia de la clase
    $productoController = new ProductoController();
    
    // Verificar si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los valores del formulario
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipo_documento = $_POST['tipo_documento'];
        $numero_documento = $_POST['numero_documento'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
    
        // Llamar al método correspondiente de la clase
        $cliete->actualizar();
    }
    
?>