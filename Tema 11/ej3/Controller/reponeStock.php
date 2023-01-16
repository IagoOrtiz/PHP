<?php
    require_once '../Model/Producto.php';

    $producto=Producto::getProductoById($_REQUEST['id']);

    $producto->setStock($producto->getStock() + $_REQUEST['stock']);

    $producto->update();

    header("Location: ../Controller/index.php");
?>