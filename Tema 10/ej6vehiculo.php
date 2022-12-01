<?php
    abstract class Vehiculo {
    
        private $kilometraje = 0;
        private static $vehiculosCreados = 0;
        private static $kmTotales = 0;
    
        public function __construct() {
            Vehiculo::$vehiculosCreados++;
        }

        public static function getVehiculosCreados() {
            return Vehiculo::$vehiculosCreados;
        }

        public static function getKmTotales() {
            return Vehiculo::$kmTotales;
        }

        public function conducir($km) {
            Vehiculo::$kmTotales+=$km;
            $this->kilometraje+=$km;
        }

        public function getKilometraje() {
            return $this->kilometraje;
        }
    
    }
?>