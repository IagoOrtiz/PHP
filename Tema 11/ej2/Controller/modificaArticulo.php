<?php
    $data['destino'] = "actualizaArticulo.php";

    $data['id'] = $_REQUEST['id'];
    $data['titulo'] = $_REQUEST['titulo'];
    $data['contenido'] = $_REQUEST['contenido'];


    include "../View/formularioArticulo.php";
?>