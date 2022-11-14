<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
</head>
<style>
    div {
        position: fixed;
        right: 35px;
        top: 35px;
        border: 1px solid black;
    }

    div * {
        margin: 4px;
    }
</style>
<body>
    <?php
    session_start();
    if (isset($_REQUEST['del'])) {
        unset($_SESSION['categorias']);
        setcookie("categorias", "", time() - 1);
    } 
    
    if (isset($_REQUEST['save'])) {
        $cookie = serialize($_SESSION['categorias']);
        setcookie("categorias", $cookie, time() + 60*60*24*365);
    }

    if (isset($_REQUEST['resetCat'])) {
        unset($_SESSION['categoria']);
    }

    if (!isset($_SESSION['categorias'])) {
        $_SESSION['categorias'] = array(
            "Deportes" => array(),
            "Política" => array(),
            "Tecnología" => array()
        );
    } 
    
    if (isset($_REQUEST['load'])) {
        if (isset($_COOKIE['categorias'])) {
            $_SESSION['categorias'] = unserialize($_COOKIE['categorias']);
        } else {
            echo "No existe periodico guardado en cookies.";
        }
        
    } else if (isset($_REQUEST['new'])) {
        $_SESSION['categorias'][$_REQUEST["nombre"]] = array();
    }

    foreach ($_SESSION['categorias'] as $categoria => $i) {
    ?>
        <form action="añadirNoticias.php" method="post">
            <input type="hidden" name="categoria" value="<?= $categoria ?>">
            <input type="submit" value="<?= $categoria ?>">
        </form>
        <br>
    <?php
    }
    ?>
    <br>
    <form action="" method="post">
        <input type="hidden" name="del">
        <input type="submit" value="Nuevo periodico">
    </form>
    <form action="" method="post">
        <input type="hidden" name="save">
        <input type="submit" value="Guardar periodico">
    </form>
    <form action="" method="post">
        <input type="hidden" name="load">
        <input type="submit" value="Cargar periodico">
    </form>
    <div>
        <h2>Añadir categoría</h2>
        <form action="" method="post">
            <input type="hidden" name="new">
            <input type="text" name="nombre" required placeholder="Nombre">
            <input type="submit" value="Añadir">
        </form>
    </div>
    
</body>

</html>