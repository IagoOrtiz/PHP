<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
</head>
<style>
    table {
        margin: 55px auto;
        width: 1000px;
        height: 600px;
        background-color: black;
        text-align: center;
    }

    th {
        background-color: purple;
    }

    td {
        background-color: violet;
    }

    img {
        width: 250px;
        padding: 10px;
        border: none;
    }
</style>
<?php
    try {
        /* No hace falta la contraseña porque root no tiene */
        $conexion = new PDO("mysql:host=localhost;dbname=tienda;charset=utf8", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT code, nombre, precio, img, descripcion FROM stock");

    $stock=array();
    while($prod = $consulta->fetchObject()) {
        $stock[$prod->code] = array("nom" => $prod->nombre, "precio" => $prod->precio, "img" => $prod->img, "desc" => $prod->descripcion);
    }
?>
<body>
    <table>
        <tr><th colspan="3"><?=$stock[$_REQUEST['prod']]['nom']?></th></tr>
        <tr>
            <td><img src="img/<?=$stock[$_REQUEST['prod']]['img']?>"></td>
            <td colspan="2"><?=$stock[$_REQUEST['prod']]['desc']?></td>
        </tr>
        <tr>
            <td>Precio: <?=$stock[$_REQUEST['prod']]['precio']?>€</td>
            <td><form action="ej3.php" method="post">
                <input type="hidden" name="prod" value="<?= $_REQUEST['prod']?>">
                <input type="hidden" name="opt" value="add">
                <input type="submit" value="Comprar">
            </form></td>
            <td><form action="ej3.php" method="post">
                <input type="submit" value="Volver">
            </form></td>
        </tr>
    </table>
</body>
</html>