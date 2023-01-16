<?php
    require_once "../Model/EscuelaBD.php";

    class Alumno {
    
        private $matricula;
        private $nombre;
        private $apellidos;
        private $curso;
    
        public function __construct($matricula, $nombre, $apellidos, $curso) {
            $this->matricula = $matricula;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->curso = $curso;
        }
        
        /* GETTERS Y SETTERS */

        public function getMatricula() {
                return $this->matricula;
        }
        public function setMatricula($matricula){
                $this->matricula = $matricula;
        }

        public function getNombre(){
                return $this->nombre;
        }
        public function setNombre($nombre){
                $this->nombre = $nombre;
        }

        public function getApellidos(){
                return $this->apellidos;
        }
        public function setApellidos($apellidos){
                $this->apellidos = $apellidos;
        }

        public function getCurso(){
            return $this->curso;
        }
        public function setCurso($curso){
            $this->curso = $curso;
        }

        /* FUNCIONES DE CLASE Y OBJETO */

        public function insert() {
            $conexion = EscuelaDB::connectDB();
            $insercion = "INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES ('$this->matricula', '$this->nombre', '$this->apellidos', '$this->curso')";
            $conexion->exec($insercion);
        }
        
        public function delete() {
            $conexion = EscuelaDB::connectDB();
            $borrado = "DELETE FROM alumno WHERE matricula='$this->matricula'";
            $conexion->exec($borrado);
        }
    
        public function update() {
            $conexion = EscuelaDB::connectDB();
            $actualiza = "UPDATE alumno SET matricula = '$this->matricula', nombre = $this->nombre, apellidos = '$this->apellidos', curso = '$this->curso' WHERE matricula = $this->matricula";
            $conexion->exec($actualiza);
        }
          
        public static function getAlumnos() {
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno";
            $consulta = $conexion->query($seleccion);
            
            $alumnos = [];
            
            while ($registro = $consulta->fetchObject()) {
              $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
            }
           
            return $alumnos;    
        }
          
        public static function getAlumnoByMatricula($matricula) {
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno WHERE matricula='$matricula'";
            $consulta = $conexion->query($seleccion);
            $registro = $consulta->fetchObject();
            $alumno = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
               
            return $alumno;
        }
    }
?>