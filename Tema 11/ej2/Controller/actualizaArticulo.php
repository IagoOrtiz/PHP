<?php
    require_once "../Model/Articulo.php";

    $articulo = Articulo::getArticuloById($_REQUEST['id']);

    $articulo->setTitulo($_REQUEST['titulo']);
    $articulo->setFecha($_REQUEST['fecha']);
    $articulo->setContenido($_REQUEST['contenido']);
    
    $articulo->update();

    header("Location: ../Controller/index.php");
?>