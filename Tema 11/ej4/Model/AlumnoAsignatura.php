<?php
    require_once "../Model/EscuelaBD.php";

    class AlumnoAsignatura {
    
        private $matricula;
        private $codigo;
    
        public function __construct($matricula, $codigo) {
            $this->matricula = $matricula;
            $this->codigo = $codigo;
        }
        
        /* GETTERS Y SETTERS */

        public function getMatricula() {
                return $this->matricula;
        }
        public function setMatricula($matricula){
                $this->matricula = $matricula;
        }

        public function getCodigo(){
                return $this->codigo;
        }
        public function setCodigo($codigo){
                $this->codigo = $codigo;
        }

        /* FUNCIONES DE CLASE Y OBJETO */

        public function insert() {
            $conexion = EscuelaDB::connectDB();
            $insercion = "INSERT INTO alumnoasignatura (matricula, codigo) VALUES ('$this->matricula', '$this->codigo')";
            $conexion->exec($insercion);
        }
        
        public function delete() {
            $conexion = EscuelaDB::connectDB();
            $borrado = "DELETE FROM alumnoasignatura WHERE matricula=$this->matricula";
            $conexion->exec($borrado);
        }
    
        public function update() {
            $conexion = EscuelaDB::connectDB();
            $actualiza = "UPDATE alumnoasignatura SET matricula = '$this->matricula', codigo = $this->codigo' WHERE matricula = '$this->matricula'";
            $conexion->exec($actualiza);
        }
          
        public static function getAlumnoAsignaturas() {
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, codigo FROM alumnoasignatura";
            $consulta = $conexion->query($seleccion);
            
            $alumnoasignaturas = [];
            
            while ($registro = $consulta->fetchObject()) {
              $alumnoasignaturas[] = new AlumnoAsignatura($registro->matricula, $registro->codigo);
            }
           
            return $alumnoasignaturas;    
        }
          
        public static function getAsignaturasByMatricula($matricula) {
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, codigo FROM alumnoasignatura WHERE matricula='$matricula'";
            $consulta = $conexion->query($seleccion);   
            
            $asignaturas = [];
            
            while ($registro = $consulta->fetchObject()) {
              $asignaturas[] = new AlumnoAsignatura($registro->matricula, $registro->codigo);
            }
               
            return $asignaturas;
        }
    }
?>