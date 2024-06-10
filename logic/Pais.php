<?php

include_once "db/Conexion.php";

class Pais extends Conexion{

    public $id;
    public $codigo;
    public $nombre;
    public $id_categoria;
    public $categoria;
    public $precio_compra;
    public $precio_venta;
    public $cantidad;

    public function crear(){
        $this->conectar();
        $sql = "INSERT INTO pais(nombre) VALUES (?)"; //Conulta SQL
        $pre = mysqli_prepare($this->conn, $sql); //Preparacion de consulta para evitar inyecciones SQL
        $pre->bind_param("s", $this->nombre);
        $pre->execute(); //Se ejecuta la consulta
        $res = $pre->get_result(); //Devuelve boolean para verificar si se hizo la consulta
    }

    public static function consultar(){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM pais";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->execute();
        $res = $pre->get_result();
        $categorias = [];
        while($categoria = $res->fetch_object(Categoria::class))
        {
            array_push($categorias, $categoria);  
        }
        return $categorias;
    }

    public function actualizar(){
        $this->conectar();
        $sql = "UPDATE pais SET nombre=? WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("si", $this->nombre, $this->id);
        $pre->execute();
    }

    public static function getId($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM pais WHERE p.id=?";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->bind_param("i", $id);
        $pre->execute();
        $res = $pre->get_result();

        return $res->fetch_object(Categoria::class);
    }

    //Revisar
    public function eliminar(){
        $this->conectar();
        $sql = "DELETE FROM pais WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("i", $this->id);
        $pre->execute();
    }
}

?>