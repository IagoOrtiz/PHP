<?php
    require_once "../Model/Articulo.php";

    $articulo = new Articulo('', $_REQUEST['titulo'], $_REQUEST['fecha'], $_REQUEST['contenido']);
    $articulo->insert();

    header("Location: ../Controller/index.php");
?>