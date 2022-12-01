<?php
    class Coche {
    
        protected $matricula;
        protected $modelo;
        protected $precio;
        protected static $modeloCaro = "None";
        protected static $precioCaro = 0;
    
        public function __construct($matricula, $modelo, $precio) {
            $this->matricula = $matricula;
            $this->modelo = $modelo;
            $this->precio = $precio;

            if ($precio > Coche::$precioCaro) {
                Coche::$precioCaro = $precio;
                Coche::$modeloCaro = $modelo;
            }

        }

        /* GETTERS */

        public function getMatricula(){
            return $this->matricula;
        }
        public function getModelo(){
            return $this->modelo;
        }
        public function getPrecio(){
            return $this->precio;
        }
        public static function getPrecioCaro(){
            return Coche::$precioCaro;
        }
        public function getModeloCaro(){
            return Coche::$modeloCaro;
        }
    
        /* SETTERS */

        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }
        public function setModelo($modelo){
            $this->modelo = $modelo;
        }
        public function setPrecio($precio){
            $this->precio = $precio;
        }
        public static function setModeloCaro($modeloCaro){
            Coche::$modeloCaro = $modeloCaro;
        }
        public static function setPrecioCaro($precioCaro){
            Coche::$precioCaro = $precioCaro;
        }

        

        /* METODOS */

        public function __toString() {
            return  
            "<tr>
                <td>$this->matricula</td>
                <td>$this->modelo</td>
                <td>$this->precio €</td>
                <td>No procede</td>
            </tr>";
        }

        public static function masCaro() {
            return array("Modelo"=>self::$modeloCaro, "Precio"=>self::$precioCaro);
        }

    }
?>