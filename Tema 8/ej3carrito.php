<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>
<style>
    table {
        border: 1px solid black;
        text-align: center;
        margin-left: 2%;
        margin-bottom: 20px;
        background-color: black;
    }

    .carrito{
        margin: 5px auto;
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
<body>
    <?php
    $lineas = file("ficheros/stock.txt");
    $stock = unserialize($lineas[0]);
    $carro = unserialize($_COOKIE['carro']);
    $total = 0;
    $flag = true;
    foreach ($stock as $clave => $producto) {
        if ($carro[$clave] > 0) {
            if ($flag) {
    ?>
                <table class="carrito">
                    <tr>
                        <th colspan="4">Carrito</th>
                    </tr>
                    <tr>
                        <th>Juego</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                    </tr>
                <?php
                $flag = false;
            }

                ?>
                <tr>
                    <td><img src="<?= $producto['img'] ?>"></td>
                    <td><?= $producto['nom'] ?></td>
                    <td><?= $carro[$clave] ?></td>
                    <td><?= $producto['precio'] ?> €</td>
                </tr>
            <?php
            $total += $producto['precio'] * $carro[$clave];
        }
    }
    if (!$flag) {
            ?>
            <tr>
                <td colspan="2">Precio total = <?= $total ?>€</td>
                <td colspan="2">
                <form action="ej3.php">
                    <input type="submit" value="Volver">
                </form>
                </td>
            </tr>
            </table>
            <?php
        }
            ?>
</body>

</html>