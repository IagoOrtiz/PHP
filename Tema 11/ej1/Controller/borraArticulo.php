<?php
    require_once "../Model/Articulo.php";

    $articulo = Articulo::getArticuloById($_REQUEST['id']);

    $articulo->delete();

    header("Location: ../Controller/index.php");
?>