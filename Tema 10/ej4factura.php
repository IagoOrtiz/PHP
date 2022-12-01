<?php
    class Factura {
    
        private static $iva = 21;
        private $importeBase = 0;
        private $fecha;
        private $estado = "Pendiente";
        private $productos = array();
    
        public function __construct($fecha) {
            $this->fecha = $fecha;
        }

        public function getImporteBase() {
            return $this->importeBase;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }

        public function getProductos() {
            return $this->productos;
        }

        public function añadeProducto($nombre, $precio, $cantidad) {
            $this->productos[$nombre] = array("precio"=>$precio, "cantidad"=>$cantidad);
            $this->importeBase += $precio*$cantidad;
        }
    
        public function imprimeFactura() {
            ?>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            <?php
            foreach ($this->productos as $nombre => $datos) {
            ?>
                <tr>
                    <td><?=$nombre?></td>
                    <td><?=$datos["precio"]?>€</td>
                    <td><?=$datos["cantidad"]?></td>
                    <td><?=($datos["precio"]*$datos["cantidad"])?>€</td>
                </tr>
            <?php
            }
            ?>
                <tr>
                    <td><?=$this->fecha?></td>
                    <td><?=$this->estado?></td>
                    <td>IVA: <?=Factura::$iva?>%</td>
                    <td>Total: <?=($this->importeBase * ((Factura::$iva/100)+1))?>€</td>
                </tr>
            </table>
            <?php
        }
    }
?>