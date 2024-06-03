<?php

include_once "db/Conexion.php";

class Producto extends Conexion{

    public $id;
    public $codigo;
    public $nombre;
    public $id_categoria;
    public $precio_compra;
    public $precio_venta;
    public $cantidad;

    public function crear(){
        $this->conectar();
        $sql = "INSERT INTO cliente(nombre, apellido, tipo_documento, num_documento, direccion, telefono, correo, contrasena) VALUES (?,?,?,?,?,?,?,?)"; //Conulta SQL
        $pre = mysqli_prepare($this->conn, $sql); //Preparacion de consulta para evitar inyecciones SQL
        $pre->bind_param("ssssssss", $this->nombre, $this->apellido, $this->tipo_documento, $this->num_documento, $this->direccion, $this->telefono, $this->correo, $this->contrasena);
        $pre->execute(); //Se ejecuta la consulta
        $res = $pre->get_result(); //Devuelve boolean para verificar si se hizo la consulta
    }

    public static function consultar(){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM cliente";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->execute();
        $res = $pre->get_result();
        $clientes = [];
        while($cliente = $res->fetch_object(Cliente::class))
        {
            array_push($clientes, $cliente);  
        }
        return $clientes;

    }

    public function actualizar(){
        $this->conectar();
        $sql = "UPDATE cliente SET nombre=?, apellido=?, tipo_documento=?, num_documento=?, direccion=?, telefono=?, correo=?, contrasena=? WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("ssssssssi", $this->nombre, $this->apellido, $this->tipo_documento, $this->num_documento, $this->direccion, $this->telefono, $this->correo, $this->contrasena, $this->id);
        $pre->execute();
    }

    public function getId($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM cliente WHERE id=?";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->bind_param("i", $id);
        $pre->execute();
        $res = $pre->get_result();

        return $res->fetch_object(Cliente::class);
    }

    //Revisar
    public function eliminar(){
        $this->conectar();
        $sql = "DELETE FROM cliente WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("i", $this->id);
        $pre->execute();
    }
}

?>