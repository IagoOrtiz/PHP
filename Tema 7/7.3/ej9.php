<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
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

    .carrito, .mod{
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
if (isset($_COOKIE['stock'])) {
    $stock=unserialize($_COOKIE['stock']);
    if (isset($_REQUEST['code'])) {
        $stock[$_REQUEST['code']] = array ("nom" => $_REQUEST['nom'], "precio" => $_REQUEST['precio'], "img" => $_REQUEST['img'], "desc" => $_REQUEST['desc']);
    }
    if (isset($_REQUEST['rmv'])) {
        unset($stock[$_REQUEST['prod']]);
    }
} else {
    $stock = [
        "pokRub" => array("nom" => "Pokemon Rubi", "precio" => 29.99, "img" => "../img/rubi.jpg", "desc" => "Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei "),
        "pokZaf" => array("nom" => "Pokemon Zafiro", "precio" => 29.99, "img" => "../img/zafiro.jpg", "desc" => "Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo "),
        "pokEme" => array("nom" => "Pokemon Esmeralda", "precio" => 34.99, "img" => "../img/esmeralda.jpg", "desc" => "Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi "),
        "sus" => array("nom" => "Amogus sus", "precio" => 6.90, "img" => "../img/sus.jpg", "desc" => "Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head ")
    ];
}
setcookie('stock', serialize($stock), time() + 60*60*24*30);

if (isset($_SESSION['carro']) && (count($_SESSION['carro']) == count($stock)) && isset($_REQUEST['prod'])) {

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

    $_SESSION['carro'] = array();

    foreach ($stock as $clave => $data) {
        $_SESSION['carro'][$clave] = 0;
    }

}
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
                <td><a href="ej9Detalle.php?prod=<?=$clave?>"><img src="<?= $producto['img'] ?>"></a></td>
                <td><?= $producto['precio'] ?>€</td>
                <td>
                    <form action="ej9.php" method="post">
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
                        <form action="ej9.php" method="post">
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
        <form action="ej9.php" method="post">
        <table class="mod">
            <th colspan="2">Añadir/Modificar producto</th>
            <tbody>
                <tr>
                    <td>Codigo</td>
                    <td><input type="text" name="code"></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="nom"></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><input type="number" name="precio"></td>
                </tr>
                <tr>
                    <td>Imagen</td>
                    <td><input type="text" name="img"></td>
                </tr>
                <tr>
                    <td>Descripción</td>
                    <td><input type="text" name="desc"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Añadir"></td>
                </tr>
            </tbody>
        </table>
        </form>
        <form action="ej9.php">
        <table class="mod">
        <tr>
            <th colspan="2">Eliminar productos</th>
        </tr>
        <?php
        foreach ($stock as $clave => $producto) {
        ?>
            <tr>
                <td><?= $clave ?></td>
                <td>
                    <form action="ej9.php" method="post">
                        <input type="hidden" name="prod" value="<?= $clave ?>">
                        <input type="hidden" name="rmv">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
        </form>
</body>

</html>