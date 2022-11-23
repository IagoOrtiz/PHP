<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar entrada</title>
</head>
<style>
    table {
        border-collapse: collapse;
        text-align: center;
        margin: 30px auto;
    }

    table * {
        margin: 2px;
    }
</style>
<?php
try {
    /* No hace falta la contraseña porque root no tiene */
    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

$consulta = $conexion->query("SELECT code, descripcion, precioCom, precioVen, stock FROM almacen WHERE code='$_REQUEST[code]'");
?>
<table border="1">
    <tr>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th>
        <th>Stock</th>
    </tr>
    <?php
    $almacen = $consulta->fetchObject();
    ?>
        <tr>
            <td><?= $almacen->code ?></td>
            <td><?= $almacen->descripcion ?></td>
            <td><?= $almacen->precioCom ?></td>
            <td><?= $almacen->precioVen ?></td>
            <td><?= $almacen->stock ?></td>
        </tr>
    <form action="ej5.php" method="post">
        <tr>
            <input type="hidden" name="mod">
            <input type="hidden" name="ogcode" value="<?=$_REQUEST['code']?>">
            <td><input type="text" name="code" maxlength="4"></td>
            <td><input type="text" name="descripcion"></td>
            <td><input type="number" name="precioCom" max="8388607"></td>
            <td><input type="number" name="precioVen" max="8388607"></td>
            <td><input type="number" name="stock" max="32767"></td>
        </tr>
        <tr>
        <td colspan="5"><input type="submit" value="Modificar"></td>
        </tr>
    </form>
</table>
<br>
<?php $conexion = null; //Cerramos la conexión a la BD?>

<body>

</body>

</html>