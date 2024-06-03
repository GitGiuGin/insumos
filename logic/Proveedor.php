<?php

include_once "db/Conexion.php";

class Proveedor extends Conexion{

    public $id;
    public $nombre;
    public $num_documento;
    public $telefono;
    public $correo;
    public $direccion;

    public function crear(){
        $this->conectar();
        $sql = "INSERT INTO proveedor(nombre, num_documento, telefono, correo, direccion) VALUES (?,?,?,?,?)"; //Conulta SQL
        $pre = mysqli_prepare($this->conn, $sql); //Preparacion de consulta para evitar inyecciones SQL
        $pre->bind_param("sssss", $this->nombre, $this->num_documento, $this->telefono, $this->correo, $this->direccion);
        $pre->execute(); //Se ejecuta la consulta
        $res = $pre->get_result(); //Devuelve boolean para verificar si se hizo la consulta
    }

    public static function consultar(){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM proveedor";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->execute();
        $res = $pre->get_result();
        $proveedores = [];
        while($proveedor = $res->fetch_object(Proveedor::class))
        {
            array_push($proveedores, $proveedor);  
        }
        return $proveedores;
    }

    public function actualizar(){
        $this->conectar();
        $sql = "UPDATE proveedor SET nombre=?, num_documento=?, telefono=?, correo=?, direccion=?, WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("sssssi", $this->nombre, $this->num_documento, $this->telefono, $this->correo, $this->direccion, $this->id);
        $pre->execute();
    }

    public static function getId($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM proveedor WHERE id=?";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->bind_param("i", $id);
        $pre->execute();
        $res = $pre->get_result();
        return $res->fetch_object(Proveedor::class);
    }

    //Revisar
    public function eliminar(){
        $this->conectar();
        $sql = "DELETE FROM proveedor WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("i", $this->id);
        $pre->execute();
    }
}

?>