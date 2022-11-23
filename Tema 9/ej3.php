<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<style>
    table {
        border: 1px solid black;
        text-align: center;
        margin-left: 2%;
        margin-bottom: 20px;
        background-color: black;
    }

    a {
        color: white;
    }

    .lista {
        float: left;
    }

    .carrito, .mod{
        float: right;
    }

    th {
        background-color: purple;
    }

    td {
        width: 190px;
        background-color: violet;
    }

    img {
        width: 180px;
        padding: 20px;
    }
</style>
<?php
session_start();
try {
    /* No hace falta la contraseña porque root no tiene */
    $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

$consulta = $conexion->query("SELECT code, nombre, precio, img, descripcion FROM stock");

if ($consulta->rowCount() != 0) {
    $stock=array();
    while($prod = $consulta->fetchObject()) {
        $stock[$prod->code] = array("nom" => $prod->nombre, "precio" => $prod->precio, "img" => $prod->img, "desc" => $prod->descripcion);
    }
    if (isset($_REQUEST['code'])) {
        $stock[$_REQUEST['code']] = array ("nom" => $_REQUEST['nom'], "precio" => $_REQUEST['precio'], "img" => $_REQUEST['img'], "desc" => $_REQUEST['desc']);
        $conexion->exec("INSERT INTO stock (code, nombre, precio, img, descripcion) 
        VALUES ('".$_REQUEST['code']."', '".$_REQUEST['nom']."', '".$_REQUEST['precio']."', '".$_REQUEST['img']."', '".$_REQUEST['desc']."')");
    }
    if (isset($_REQUEST['rmv'])) {
        unset($stock[$_REQUEST['prod']]);
        $conexion->exec("DELETE FROM stock WHERE code=".$_REQUEST['prod']);
    }
} else {
    $stock = [
        "pokRub" => array("nom" => "Pokemon Rubi", "precio" => 29.99, "img" => "rubi.jpg", "desc" => "Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei Lorei "),
        "pokZaf" => array("nom" => "Pokemon Zafiro", "precio" => 29.99, "img" => "zafiro.jpg", "desc" => "Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo Lorailo "),
        "pokEme" => array("nom" => "Pokemon Esmeralda", "precio" => 34.99, "img" => "esmeralda.jpg", "desc" => "Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi Laroi "),
        "sus" => array("nom" => "Amogus sus", "precio" => 6.90, "img" => "sus.jpg", "desc" => "Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head Get out of my head ")
    ];
    $conexion->exec("INSERT INTO stock (code, nombre, precio, img, descripcion) 
    VALUES ('pokRub', 'Pokemon Rubi', '29,99', 'rubi.jpg', 'El pokemon del dinosaurio rojo feo')");
    $conexion->exec("INSERT INTO stock (code, nombre, precio, img, descripcion) 
    VALUES ('pokZaf', 'Pokemon Zafiro', '29,99', 'zafiro.jpg', 'El pokemon de la ballena chulonga')");
    $conexion->exec("INSERT INTO stock (code, nombre, precio, img, descripcion) 
    VALUES ('pokEme', 'Pokemon Esmeralda', '29,99', 'esmeralda.jpg', 'El pokemon de gusano verde volador')");
    $conexion->exec("INSERT INTO stock (code, nombre, precio, img, descripcion) 
    VALUES ('sus', 'Amogus sus', '6,90', 'sus.jpg', 'Get out of my head')");
}

if (isset($_COOKIE['carro']) && (count(unserialize($_COOKIE['carro'])) == count($stock))) {
    $carro = unserialize($_COOKIE['carro']);

    if (isset($_REQUEST['opt'])) {

        if ($_REQUEST['opt'] == "del") {
            $carro[$_REQUEST['prod']]--;
        } else {
            $carro[$_REQUEST['prod']]++;
        }

        if ($carro[$_REQUEST['prod']] < 0) {
            $carro[$_REQUEST['prod']] = 0;
        }
    }

} else {

    $carro = array();

    foreach ($stock as $clave => $data) {
        $carro[$clave] = 0;
    }

}
setcookie('carro', serialize($carro), time() + 60*60*24*30);
?>

<body>
    <h1>Videojuegos Sussy Baka</h1>
    <table class="lista">
        <tr>
            <th>Juego</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Añadir al carrito</th>
        </tr>
        <?php
        foreach ($stock as $clave => $producto) {
        ?>
            <tr>
                <td><a href="ej3Detalle.php?prod=<?=$clave?>"><img src="img/<?= $producto['img'] ?>"></a></td>
                <td><?=$producto['nom']?></td>
                <td><?= $producto['precio'] ?>€</td>
                <td>
                    <form action="#" method="post">
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
        if ($carro[$clave] > 0) {
            if ($flag) {
                ?>
                <table class="carrito">
                    <tr>
                        <th colspan="3"><a href="ej3carrito.php">Carrito</a></th>
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
                    <td><img src="img/<?= $producto['img'] ?>"></td>
                    <td><?= $carro[$clave] ?></td>
                    <td>
                        <form action="#" method="post">
                            <input type="hidden" name="prod" value="<?= $clave ?>">
                            <input type="hidden" name="opt" value="del">
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
        <?php
            $total+=$producto['precio']*$carro[$clave];
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
        <form action="#" method="post">
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
        <form action="#" method="post">
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
                    <form action="#" method="post">
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