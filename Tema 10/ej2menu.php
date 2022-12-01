<?php
    class Menu {

        private $elementos = array();
        private $enlaces = array();
    
        public function __construct() {
        }

        public function añadeElemento($nom, $link) {
            $this->elementos[] = $nom;
            $this->enlaces[] = $link;
        }

        public function menuVertical() {
            for ($i=0; $i < sizeOf($this->elementos); $i++) { 
                echo "<a href='".$this->enlaces[$i]."'>".$this->elementos[$i]."</a><br>";
            }
        }

        public function menuHorizontal() {
            for ($i=0; $i < sizeOf($this->elementos); $i++) { 
                if ($i == sizeOf($this->elementos)-1) {
                    echo "<a href='".$this->enlaces[$i]."'>".$this->elementos[$i]."</a>";
                } else {
                    echo "<a href='".$this->enlaces[$i]."'>".$this->elementos[$i]."</a> - ";
                }
                
            }
            echo "<br>";
        }

    }
?>