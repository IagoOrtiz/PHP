<?php
require_once "../Model/HospitalBD.php";

class Usuario {

    private $id;
    private $nombre;
    private $clave;
    private $perfil;

    public function __construct($id = 0, $nombre = 0, $clave = 0, $perfil = 0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->perfil = $perfil;
    }

    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getClave() {
        return $this->clave;
    }
    public function getPerfil() {
        return $this->perfil;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
    public function setClave($clave) {
        $this->clave = $clave;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    

    public function insert() {
        $conexion = HospitalDB::connectDB();
        $insercion = "INSERT INTO usuario (nombre, clave, perfil) VALUES ('$this->nombre', '$this->clave', '$this->perfil')";
        $conexion->exec($insercion);
    }
    
    public function delete() {
        $conexion = HospitalDB::connectDB();
        $borrado = "DELETE FROM usuario WHERE id=$this->id";
        $conexion->exec($borrado);
    }

    public function update() {
        $conexion = HospitalDB::connectDB();
        $actualiza = "UPDATE usuario SET nombre = '$this->nombre', clave = '$this->clave', perfil = '$this->perfil' WHERE id = $this->id";
        $conexion->exec($actualiza);
    }
      
    public static function getUsuarios() {
        $conexion = HospitalDB::connectDB();
        $seleccion = "SELECT id, nombre, clave, perfil FROM usuario";
        $consulta = $conexion->query($seleccion);
        
        $usuarios = [];
        
        while ($registro = $consulta->fetchObject()) {
          $usuarios[] = new Usuario($registro->id, $registro->nombre, $registro->clave, $registro->perfil);
        }
       
        return $usuarios;    
    }
      
    public static function getUsuarioById($id) {
        $conexion = HospitalDB::connectDB();
        $seleccion = "SELECT id, nombre, clave, perfil FROM usuario WHERE id=$id";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        $usuario = new Usuario($registro->id, $registro->nombre, $registro->clave, $registro->perfil);
           
        return $usuario;    
    }

    public static function getUsuarioByLogin($nombre, $clave) {
        $conexion = HospitalDB::connectDB();
        $seleccion = "SELECT id, nombre, clave, perfil FROM usuario WHERE nombre='$nombre' AND clave='$clave'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        if ($registro != false) {
            $usuario = new Usuario($registro->id, $registro->nombre, $registro->clave, $registro->perfil);
            return $usuario;   
        } else {
            return $registro;
        }
         
    }

    public static function getMedicos() {
        $conexion = HospitalDB::connectDB();
        $seleccion = "SELECT id, nombre, clave, perfil FROM usuario WHERE perfil='medico'";
        $consulta = $conexion->query($seleccion);
        
        $usuarios = [];
        
        while ($registro = $consulta->fetchObject()) {
          $usuarios[] = new Usuario($registro->id, $registro->nombre, $registro->clave, $registro->perfil);
        }
       
        return $usuarios;
    }
    
}