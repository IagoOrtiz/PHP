<?php
    class Bombilla {
    
        private $encendida = false;
        private $potencia;
        private $ubicacion;

        private static $interruptorGeneral = true;
        private static $potenciaTotal = 0;
    
        public function __construct($potencia, $ubicacion) {
            $this->potencia=$potencia;
            $this->ubicacion=$ubicacion;
            self::$potenciaTotal += $potencia;
        }
    
        /* GETTERS */

        public function getEncendida() {
            return $this->encendida;
        }
        public function getPotencia() {
            return $this->potencia;
        }
        public function getUbicacion() {
            return $this->ubicacion;
        }

        public static function getInterruptorGeneral() {
            return self::$interruptorGeneral;
        }

        /* SETTERS */

        public function setEncendida($encendida) {
            $this->encendida = $encendida;
        }
        public function setPotencia($potencia) {
            $this->potencia = $potencia;
        }
        public function setUbicacion($ubicacion) {
            $this->ubicacion = $ubicacion;
        }

        /* METODOS */

        public function interruptor() {
            $this->encendida = !$this->encendida;
        }

        public function estaEncendida() {
            return $this->encendida;
        }

        public static function interruptorGeneral() {
            self::$interruptorGeneral = !self::$interruptorGeneral;
        }

        public static function potenciaConsumida() {
            if (self::$interruptorGeneral) {
                return self::$potenciaTotal;
            } else {
                return 0;
            }
        }

        public function __toString() {
            if ($this->encendida && self::$interruptorGeneral) {
                return "$this->ubicacion: ●";
            } else {
                return "$this->ubicacion: ◌";
            }
        }
    }
?>