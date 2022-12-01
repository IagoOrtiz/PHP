<?php
    class Zona {
    
        private $entradas;
    
        public function __construct($entradas) {
            $this->entradas=$entradas;
        }

        public function venderEntradas($num) {
            if ($num > $this->entradas) {
                echo "No hay suficientes entradas, intente comprar una cantidad menor<br><br>";
            } else {
                $this->entradas-=$num;
            }
        }

        public function getEntradas() {
            return $this->entradas;
        }
    
    }
?>