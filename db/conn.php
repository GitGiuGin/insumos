<?php
    $user = "root";
    $password = "";
    $server = "localhost";
    $db = "insumos";

    $conn = mysqli_connect($server, $user, $password, $db) 
                or die ("Error al conectar a la BD.");
?>