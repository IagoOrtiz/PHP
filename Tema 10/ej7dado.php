<?php
    class DadoPoker {
    
        private $caras = array('As', 'K', 'Q', 'J', '7', '8');
        private $cara = 'As';
        private static $tiradas = 0;
    
        public function __construct() {
        }

        public function tira() {
            $this->cara = $this->caras[random_int(0,5)];
            self::$tiradas++;
        }
    
        public function nombreFigura() {
            return $this->cara;
        }

        public static function getTiradasTotales() {
            return self::$tiradas;
        }
    }
?>