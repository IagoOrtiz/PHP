<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<style>
    table {
        border: 1px solid black;
        text-align: center;
        margin-left: 2%;
        margin-bottom: 20px;
    }

    .lista {
        float: left;
    }

    .carrito {
        float: right;
    }

    th {
        border-bottom: 1px solid black;
    }

    td {
        width: 200px;
    }

    img {
        width: 180px;
        padding: 20px;
    }
</style>
<?php
session_start();
if (isset($_SESSION['carro']) && isset($_REQUEST['prod'])) {
    $_SESSION['carro'][$_REQUEST['prod']]++;
    if (isset($_REQUEST['del'])) {
        $_SESSION['carro'][$_REQUEST['prod']] -= 2;
    }
    if ($_SESSION['carro'][$_REQUEST['prod']] < 0) {
        $_SESSION['carro'][$_REQUEST['prod']] = 0;
    }
} else {
    $_SESSION['carro'] = [
        "pokRub" => 0,
        "pokZaf" => 0,
        "pokEme" => 0,
        "sus" => 0
    ];
}
$stock = [
    "pokRub" => array("nom" => "Pokemon Rubi", "precio" => 29.99, "img" => "../img/rubi.jpg"),
    "pokZaf" => array("nom" => "Pokemon Zafiro", "precio" => 29.99, "img" => "../img/zafiro.jpg"),
    "pokEme" => array("nom" => "Pokemon Esmeralda", "precio" => 34.99, "img" => "../img/esmeralda.jpg"),
    "sus" => array("nom" => "Amogus sus", "precio" => 6.90, "img" => "../img/sus.jpg")
];
?>

<body>
    <h1>Videojuegos Sussy Baka</h1>
    <table class="lista">
        <tr>
            <th>Juego</th>
            <th>Precio</th>
            <th>Añadir al carrito</th>
        </tr>
        <?php
        foreach ($stock as $clave => $producto) {
        ?>
            <tr>
                <td><img src="<?= $producto['img'] ?>"></td>
                <td><?= $producto['precio'] ?>€</td>
                <td>
                    <form action="ej5.php" method="post">
                        <input type="hidden" name="prod" value="<?= $clave ?>">
                        <input type="submit" value="Añadir">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <?php
    $flag = true;
    $total = 0;
    foreach ($stock as $clave => $producto) {
        if ($_SESSION['carro'][$clave] > 0) {
            if ($flag) {
                ?>
                <table class="carrito">
                    <tr>
                        <th colspan="3">Carrito</th>
                    </tr>
                    <tr>
                        <th>Juego</th>
                        <th>Cantidad</th>
                        <th>Eliminar</th>
                    </tr>
                <?php
                $flag=false;
            }

                ?>
                <tr>
                    <td><img src="<?= $producto['img'] ?>"></td>
                    <td><?= $_SESSION['carro'][$clave] ?></td>
                    <td>
                        <form action="ej5.php" method="post">
                            <input type="hidden" name="prod" value="<?= $clave ?>">
                            <input type="submit" value="Eliminar">
                            <input type="hidden" name="del">
                        </form>
                    </td>
                </tr>
        <?php
            $total+=$producto['precio']*$_SESSION['carro'][$clave];
        }
    }
        if (!$flag) {
            ?>
            <tr>
                <td colspan="3">Precio total = <?=$total?>€</td>
            </tr>
            </table>
            <?php
        }
        ?>
</body>

</html>