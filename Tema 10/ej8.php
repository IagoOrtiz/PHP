<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<body>
    <?php
        include "ej8zona.php";
        session_start();
        
        if (!isset($_SESSION['zonaPrincipal'])) {
            $_SESSION['zonaPrincipal'] = new Zona(1000);
            $_SESSION['zonaCompraVenta'] = new Zona(200);
            $_SESSION['zonaVIP'] = new Zona(25);
        } else if (isset($_REQUEST['entradas'])) {
            $_SESSION[$_REQUEST['zona']]->venderEntradas($_REQUEST['entradas']);
        }
        ?>
        <table>
            <tr>
                <th colspan="3">Venta de entradas Expocoches Campanillas</th>
            </tr>
            <tr>
                <th>Zona</th>
                <th>Entradas disponibles</th>
                <th>Ventanilla</th>
            </tr>
            <?php
            foreach ($_SESSION as $zona => $objeto) {
            ?>
            <tr>
                <td><?=$zona?></td>
                <td><?=$objeto->getEntradas()?></td>
                <td>
                    <form action="" method="post">
                        <input type="number" name="entradas" min=0>
                        <input type="hidden" name="zona" value="<?=$zona?>">
                        <input type="submit" value="Comprar">
                    </form>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <?php

    ?>
</body>
</html>