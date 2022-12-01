<?php
    class Cubo {
    
        private $capacidad;
        private $cantidad;
    
        public function __construct($capacidad, $cantidad) {
            $this->capacidad = $capacidad;
            if($cantidad > $capacidad) {
                $this->cantidad = $capacidad;
            } else {
                $this->cantidad = $cantidad;
            }
        }

        public function getCapacidad() {
            return $this->capacidad;
        }
    
        public function getCantidad() {
            return $this->cantidad;
        }

        public function verterEn($cuboExt) {
            if (($cuboExt->capacidad - $cuboExt->cantidad) < $this->cantidad) {
                $this->cantidad -= $cuboExt->capacidad - $cuboExt->cantidad;
                $cuboExt->cantidad = $cuboExt->capacidad;
            } else {
                $cuboExt->cantidad += $this->cantidad;
                $this->cantidad = 0;
            }
        }

        public function __toString() {
            $return = "";
            
            for ($i=0; $i < $this->cantidad; $i++) { 
                $return = $return."■";
            }
            
            for ($i=0; $i < ($this->capacidad - $this->cantidad); $i++) { 
                $return = $return."□";
            }

            return $return;
        }
    }
?>