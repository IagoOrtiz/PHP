<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>
<style>
    table *{
        border: 1px solid black;
        text-align: center;
    }

    table {
        position: relative;
        width: 1000px;
        left: 50%;
        margin-left: -500px;
    }
</style>
<?php
    session_start();
?>
<body>
    <table>
        <tr><th colspan="3"><?=$_SESSION['stock'][$_REQUEST['prod']]['nom']?></th></tr>
        <tr>
            <td><img src="<?=$_SESSION['stock'][$_REQUEST['prod']]['img']?>"></td>
            <td colspan="2"><?=$_SESSION['stock'][$_REQUEST['prod']]['desc']?></td>
        </tr>
        <tr>
            <td>Precio: <?=$_SESSION['stock'][$_REQUEST['prod']]['precio']?>€</td>
            <td><form action="ej6.php" method="post">
                <input type="hidden" name="prod" value="<?= $_REQUEST['prod']?>">
                <input type="hidden" name="opt" value="add">
                <input type="submit" value="Comprar">
            </form></td>
            <td><form action="ej6.php" method="post">
                <input type="submit" value="Volver">
            </form></td>
        </tr>
    </table>
</body>
</html>