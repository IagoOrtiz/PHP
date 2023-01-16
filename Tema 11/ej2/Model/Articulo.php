<?php
require_once "../Model/BlogDB.php";

class Articulo {

    private $id;
    private $titulo;
    private $fecha;
    private $contenido;

    public function __construct($id = 0, $titulo = 0, $fecha = 0, $contenido = 0) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->contenido = $contenido;
    }

    public function getId() {
        return $this->id;
    }
    public function getTitulo() {
        return $this->titulo;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getContenido() {
        return $this->contenido;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setContenido($contenido) {
        $this->contenido = $contenido;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    

    public function insert() {
        $conexion = BlogDB::connectDB();
        $insercion = "INSERT INTO articulo (titulo, fecha, contenido) VALUES ('$this->titulo', '$this->fecha', '$this->contenido')";
        $conexion->exec($insercion);
    }
    
    public function delete() {
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM articulo WHERE id=$this->id";
        $conexion->exec($borrado);
    }

    public function update() {
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE articulo SET titulo = '$this->titulo', fecha = '$this->fecha', contenido = '$this->contenido' WHERE id = $this->id";
        $conexion->exec($actualiza);
    }
      
    public static function getArticulos() {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT id, titulo, fecha, contenido FROM articulo";
        $consulta = $conexion->query($seleccion);
        
        $articulos = [];
        
        while ($registro = $consulta->fetchObject()) {
          $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
        }
       
        return $articulos;    
    }
      
    public static function getArticuloById($id) {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT id, titulo, fecha, contenido FROM articulo WHERE id=$id";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $articulo = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
           
        return $articulo;    
    }
}