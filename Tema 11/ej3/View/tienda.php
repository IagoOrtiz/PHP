<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel='stylesheet' href='../View/css/styles.css'>
</head>
<body>
    <h1>Videojuegos Megalovania</h1>
    <div class="container">
    <div class="cesta">
        <table>
            <tr>
                <th colspan="3">Cesta</th>
            </tr>
            <?php
            $flag = false;
            foreach ($_SESSION['cesta'] as $id => $datos) {
                if ($datos['num'] > 0) {
                    $flag = true;
                ?>
                <tr>
                    <td><img src="../View/img/<?=$datos['img']?>" alt="Producto <?=$id?>"></td>
                    <td><?=$datos['num']?></td>
                    <td><form action="eliminarCesta.php" method="post">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" value="Eliminar">
                    </form></td>
                </tr>
                <?php
                }
            }
            if ($flag) {
            ?>
            <tr>
                <form action="confirmaVenta.php" method="post"><th colspan="3"><input type="submit" value="Comprar y enviar"></th></form>
            </tr>
            <?php
            } else {
            ?>
            <tr>
                <td>No tienes ningun producto</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="productos">
        <table>
            <tr>
                <th>Juego</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Opciones</th>
            </tr>
    <?php
    foreach ($data['productos'] as $producto) {
    ?>
        <tr>
            <td><img src="../View/img/<?=$producto->getImg()?>" alt="<?=$producto->getNombre()?>"></td>
            <td><?=$producto->getPrecio()?>€</td>
            <td><?=$producto->getStock()?></td>
            <td>
                <form action="añadeCesta.php" method="post">
                    <input type="hidden" name="id" value="<?=$producto->getId()?>">
                    <input type="submit" value="Añadir al carro">
                </form>
            </td>
        </tr>
    <?php
    }
    ?>
        </table>
    </div>
    <div class="modificar">
        <table>
    <?php
    foreach ($data['productos'] as $producto) {
    ?>
        <tr>
            <td><?=$producto->getNombre()?></td>
            <td><form action="añadeStock.php" method="post">
                <input type="hidden" name="id" value="<?=$producto->getId()?>">
                <input type="submit" value="Reponer">
            </form></td>
        </tr>
    <?php
    }
    ?>
        </table>
    </div>
    </div>
</body>
</html>