<?php
    include_once "ej6vehiculo.php";
    class Coche extends Vehiculo{
    
        public function quemarueda() {
            $exp = random_int(1,20);
            if ($exp == 1) {
                return "El coche se tropieza y explota.";
            } else if ($exp == 20) {
                return "El coche derrapa de forma espectacular sin hacer daño a la rueda de alguna forma.";
            } else {
                return "El coche quema rueda, dejandote un paso mas cerca del reventón.";
            }
        }
        
    
    }
?>