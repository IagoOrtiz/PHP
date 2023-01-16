<?php
    session_start();

    require_once '../Model/Producto.php';

    $productos = Producto::getProductos();

    for ($i=0; $i < count($_SESSION['cesta']); $i++) { 
        $productos[$i]->setStock($productos[$i]->getStock()-$_SESSION['cesta'][$i+1]['num']);
        $productos[$i]->update();
    }

    session_destroy();

    header("Location: ../Controller/index.php");

?>