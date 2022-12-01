<?php
    include_once "ej6vehiculo.php";
    class Bicicleta extends Vehiculo{
    
        public function caballito() {
            $exp = random_int(1,20);
            if ($exp == 1) {
                return "Te tropiezas con una piedra y explotas.";
            } else if ($exp == 20) {
                return "Lo haces tan bien que te marcas un backflip con la bicicleta.";
            } else if ($exp <= 10) {
                return "Intentas hacer un caballito pero fracasas.";
            } else {
                return "Haces un caballito de toda la vida con la bicicleta.";
            }
        }
        
    }
?>