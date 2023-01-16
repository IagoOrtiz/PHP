<?php
    require_once "../Model/Articulo.php";

    $data['articulos'] = Articulo::getArticulos();

    include "../View/entradas.php";
?>