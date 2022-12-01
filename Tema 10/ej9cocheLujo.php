<?php
    include_once "ej9coche.php";

    class CocheLujo extends Coche {
    
        private $suplemento;
    
        public function __construct($matricula, $modelo, $precio, $suplemento) {
            parent::__construct($matricula, $modelo, $precio);
            $this->suplemento = $suplemento;
        }

        public function getPrecio(){
            return $this->precio+$this->suplemento;
        }

        public function __toString() {
            return  
            "<tr>
                <td>$this->matricula</td>
                <td>$this->modelo</td>
                <td>$this->precio €</td>
                <td>$this->suplemento €</td>
            </tr>";
        }
    
    }
?>