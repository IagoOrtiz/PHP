<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_REQUEST['del'])) {
        unset($_SESSION['categorias']);
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
    ?>
    <?php
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
        <input type="submit" value="Eliminar periodico">
    </form>
</body>

</html>