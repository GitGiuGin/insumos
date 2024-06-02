<?php

class Conexion{
    public $conn;

    public function conectar(){
        $user = "root";
        $password = "";
        $server = "localhost";
        $db = "insumos";

        $this->conn = mysqli_connect($server, $user, $password, $db);
    }

}
?>