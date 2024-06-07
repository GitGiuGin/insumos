<?php

include_once "db/Conexion.php";

class Producto extends Conexion{

    public $id;
    public $codigo;
    public $nombre;
    public $id_categoria;
    public $pais;
    public $categoria;
    public $precio_compra;
    public $precio_venta;
    public $cantidad;

    public function crear(){
        $this->conectar();
        $sql = "INSERT INTO producto(codigo, nombre, id_categoria, pais, precio_compra, precio_venta, cantidad) VALUES (?,?,?,?,?,?,?)"; //Conulta SQL
        $pre = mysqli_prepare($this->conn, $sql); //Preparacion de consulta para evitar inyecciones SQL
        $pre->bind_param("ssiddi", $this->codigo, $this->nombre, $this->id_categoria, $this->pais, $this->precio_compra, $this->precio_venta, $this->cantidad);
        $pre->execute(); //Se ejecuta la consulta
        $res = $pre->get_result(); //Devuelve boolean para verificar si se hizo la consulta
    }

    public static function consultar(){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT p.id, p.codigo, p.nombre, c.id AS id_categoria, c.nombre AS categoria, p.pais, p.precio_compra, p.precio_venta, p.cantidad FROM producto AS p JOIN categoria AS c ON p.id_categoria = c.id ORDER BY p.id ASC;";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->execute();
        $res = $pre->get_result();
        $productos = [];
        while($producto = $res->fetch_object(Producto::class))
        {
            array_push($productos, $producto);  
        }
        return $productos;
    }

    public function actualizar(){
        $this->conectar();
        $sql = "UPDATE producto SET codigo=?, nombre=?, id_categoria=?, pais=?, precio_compra=?, precio_venta=?, cantidad=? WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("ssiddii", $this->codigo, $this->nombre, $this->id_categoria, $this->pais, $this->precio_compra, $this->precio_venta, $this->cantidad, $this->id);
        $pre->execute();
    }

    public static function getId($id){
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT p.id, p.codigo, p.nombre, c.id AS id_categoria, c.nombre AS categoria, p.pais, p.precio_compra, p.precio_venta, p.cantidad FROM producto AS p JOIN categoria AS c ON p.id_categoria = c.id WHERE p.id=?";
        $pre = mysqli_prepare($conexion->conn, $sql);
        $pre->bind_param("i", $id);
        $pre->execute();
        $res = $pre->get_result();

        return $res->fetch_object(Producto::class);
    }

    //Revisar
    public function eliminar(){
        $this->conectar();
        $sql = "DELETE FROM producto WHERE id=?";
        $pre = mysqli_prepare($this->conn, $sql);
        $pre->bind_param("i", $this->id);
        $pre->execute();
    }
}

?>