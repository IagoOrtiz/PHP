<?php
    session_start();

    require_once '../Model/Producto.php';

    $producto = Producto::getProductoById($_REQUEST['id']);

    if (!($producto->getStock() - $_SESSION['cesta'][$_REQUEST['id']]['num']) <= 0) {
        
        $_SESSION['cesta'][$_REQUEST['id']]['num']++;

    }

    header("Location: ../Controller/index.php");
    
?>