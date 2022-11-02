<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
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

    if (isset($_REQUEST['opt'])) {
        if ($_REQUEST['opt'] == "del") {
            $_SESSION['carro'][$_REQUEST['prod']]--;
        } else {
            $_SESSION['carro'][$_REQUEST['prod']]++;
        }
        unset($_REQUEST['opt']);
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

$_SESSION['stock'] = [
    "pokRub" => array("nom" => "Pokemon Rubi", "precio" => 29.99, "img" => "../img/rubi.jpg", "desc" => "Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei "),
    "pokZaf" => array("nom" => "Pokemon Zafiro", "precio" => 29.99, "img" => "../img/zafiro.jpg", "desc" => "Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo "),
    "pokEme" => array("nom" => "Pokemon Esmeralda", "precio" => 34.99, "img" => "../img/esmeralda.jpg", "desc" => "Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi "),
    "sus" => array("nom" => "Amogus sus", "precio" => 6.90, "img" => "../img/sus.jpg", "desc" => "Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head ")
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
        foreach ($_SESSION['stock'] as $clave => $producto) {
        ?>
            <tr>
                <td><a href="Ej6Detalle.php?prod=<?=$clave?>"><img src="<?= $producto['img'] ?>"></a></td>
                <td><?= $producto['precio'] ?>€</td>
                <td>
                    <form action="ej6.php" method="post">
                        <input type="hidden" name="prod" value="<?= $clave ?>">
                        <input type="hidden" name="opt" value="add">
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
    foreach ($_SESSION['stock'] as $clave => $producto) {
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
                        <form action="ej6.php" method="post">
                            <input type="hidden" name="prod" value="<?= $clave ?>">
                            <input type="hidden" name="opt" value="del">
                            <input type="submit" value="Eliminar">
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