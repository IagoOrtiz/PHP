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
    $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

$consulta = $conexion->query("SELECT DNI, Nombre, Direccion, Telefono FROM cliente WHERE DNI=".$_REQUEST['DNI']);
?>
<table border="1">
    <tr>
        <td><b>DNI</b></td>
        <td><b>Nombre</b></td>
        <td><b>Dirección</b></td>
        <td><b>Teléfono</b></td>
    </tr>
    <?php
    $cliente = $consulta->fetchObject();
    ?>
        <tr>
            <td><?= $cliente->DNI ?></td>
            <td><?= $cliente->Nombre ?></td>
            <td><?= $cliente->Direccion ?></td>
            <td><?= $cliente->Telefono ?></td>
        </tr>
    <form action="ej2.php" method="post">
        <tr>
            <input type="hidden" name="mod">
            <input type="hidden" name="ogDNI" value="<?=$_REQUEST['DNI']?>">
            <td><input type="number" name="DNI" maxlength="10"></td>
            <td><input type="text" name="Nombre" maxlength="20"></td>
            <td><input type="text" name="Direccion" maxlength="30"></td>
            <td><input type="number" name="Telefono" maxlength="11"></td>
        </tr>
        <tr>
        <td colspan="4"><input type="submit" value="Modificar"></td>
        </tr>
    </form>
</table>
<br>
<?php $conexion = null; //Cerramos la conexión a la BD?>

<body>

</body>

</html>