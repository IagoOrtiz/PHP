<?php
require_once "../Model/HospitalBD.php";

class Cita {

    private $paciente;
    private $medico;
    private $fecha;
    private $hora;

    public function __construct($paciente = 0, $medico = 0, $fecha = 0, $hora = 0) {
        $this->paciente = $paciente;
        $this->medico = $medico;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function getPaciente() {
        return $this->paciente;
    }
    public function getMedico() {
        return $this->medico;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getHora() {
        return $this->hora;
    }

    public function setPaciente($paciente) {
        $this->paciente = $paciente;
    }
    public function setHora($hora) {
        $this->hora = $hora;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setMedico($medico) {
        $this->medico = $medico;
    }


    public function insert() {
        $conexion = HospitalDB::connectDB();
        $insercion = "INSERT INTO cita (paciente, medico, fecha, hora) VALUES ($this->paciente, $this->medico, '$this->fecha', $this->hora)";
        $conexion->exec($insercion);
    }
    
    public function delete() {
        $conexion = HospitalDB::connectDB();
        $borrado = "DELETE FROM cita WHERE paciente=$this->paciente AND medico=$this->medico and fecha='$this->fecha'";
        $conexion->exec($borrado);
    }

    public static function getCitasByPaciente($paciente, $fecha) {
        $conexion = HospitalDB::connectDB();
        $seleccion = "SELECT paciente, medico, fecha, hora FROM cita WHERE paciente=$paciente AND fecha='$fecha'";
        $consulta = $conexion->query($seleccion);
        
        $citas = [];
        
        while ($registro = $consulta->fetchObject()) {
          $citas[] = new Cita($registro->paciente, $registro->medico, $registro->fecha, $registro->hora);
        }
       
        return $citas;
    }
      
    public static function getCitaById($paciente, $medico, $fecha) {
        $conexion = HospitalDB::connectDB();
        $seleccion = "SELECT paciente, medico, fecha, hora FROM cita WHERE paciente=$paciente AND medico=$medico AND fecha='$fecha'";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        if ($registro != false) {
            $cita = new Cita($registro->paciente, $registro->medico, $registro->fecha, $registro->hora); 
            return $cita;   
        } else {
            return $registro;
        }
        
    }

    public static function getCitaOcupada($medico, $fecha, $hora) {
        $conexion = HospitalDB::connectDB();
        $seleccion = "SELECT paciente, medico, fecha, hora FROM cita WHERE medico=$medico AND fecha='$fecha' AND hora=$hora";
        $consulta = $conexion->query($seleccion);
        $registro = $consulta->fetchObject();
        if ($registro != false) {
            return true;   
        } else {
            return false;
        }
    }
}