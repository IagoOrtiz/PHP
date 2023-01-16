<?php
    require_once '../Model/Producto.php';

    session_start();
    $data['productos'] = Producto::getProductos();

    if (!isset($_SESSION['cesta'])) {
    foreach ($data['productos'] as $producto) {
        $_SESSION['cesta'][$producto->getId()] = array(
            "img" => $producto->getImg(),
            "num" => 0
        );
    }
    }

    include '../View/tienda.php'
?>