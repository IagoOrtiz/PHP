<?php
require_once '../Model/TiendaDB.php';

class Producto {

    /* ATRIBUTOS */

    private $id;
    private $nombre;
    private $precio;
    private $img;
    private $stock;
    
    public function __construct($id = 0, $nombre = 0, $precio = 0, $img = 0, $stock = 0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->img = $img;
        $this->stock = $stock;
    }

    /* GETTERS Y SETTERS */

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio; 
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
    }

    /* FUNCIONES */

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO producto (nombre, precio, img, stock) VALUES ('$this->nombre', '$this->precio', '$this->img', '$this->stock')";
        $conexion->exec($insercion);
    }
    
    public function delete() {
        $conexion = TiendaDB::connectDB();
        $borrado = "DELETE FROM producto WHERE id=$this->id";
        $conexion->exec($borrado);
    }

    public function update() {
        $conexion = TiendaDB::connectDB();
        $actualiza = "UPDATE producto SET nombre = '$this->nombre', precio = $this->precio, img = '$this->img', stock = '$this->stock' WHERE id = $this->id";
        $conexion->exec($actualiza);
    }
      
    public static function getProductos() {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id, nombre, precio, img, stock FROM producto";
        $consulta = $conexion->query($seleccion);
        
        $productos = [];
        
        while ($registro = $consulta->fetchObject()) {
          $productos[] = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->img, $registro->stock);
        }
       
        return $productos;    
    }
      
    public static function getProductoById($id) {
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id, nombre, precio, img, stock FROM producto WHERE id=$id";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $producto = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->img, $registro->stock);
           
        return $producto;
    }
}
