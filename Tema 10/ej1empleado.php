<?php

    class Empleado {
        private $nombre;
        private $sueldo;
        public function __construct($nombre, $sueldo) {
            $this->nombre = $nombre;
            $this->sueldo=($sueldo==null) ? 0 : $sueldo;
        }

        public function asigna($nombre, $sueldo) {
            if ($nombre == $this->nombre) {
                $this->sueldo = $sueldo;
            }
        }

        public function pagaImpuestos() {
            if ($this->sueldo > 3000) {
                return "$this->nombre tiene que pagar impuestos.";
            } else {
                return "$this->nombre no tiene que pagar impuestos.";
            }
        }

        public function __toString() {
            return "Nombre: $this->nombre<br>Sueldo: $this->sueldo €<br>";
        }
    }

?>