<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<style>
    * {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    table {
        border-collapse: collapse;
        text-align: center;
        margin: 30px auto;
        
    }

    table * {
        margin: 2px;
    }

    td:last-child {
        width: 200px;
    }

    input[value="Añadir"] {
        background-color: lime;
        border-radius: 5px;
        border: none;
        padding: 5px;
        width: 50%;
    }

    input[value="Eliminar"] {
        background-color: red;
        border-radius: 5px;
        border: none;
        padding: 5px;
        width: 50%;
    }
    input[value="Modificar"] {
        background-color: yellow;
        border-radius: 5px;
        border: none;
        padding: 5px;
        width: 50%;
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

if (isset($_REQUEST['DNI']) && $_REQUEST['DNI'] != "" && !isset($_REQUEST['mod'])) {
    $consulta = $conexion->query("SELECT DNI FROM cliente WHERE DNI=".$_POST['DNI']);
    if ($consulta->rowCount() == 0) {
        $conexion->exec("INSERT INTO cliente (DNI, Nombre, Direccion, Telefono)
        VALUES ('$_POST[DNI]','$_POST[Nombre]','$_POST[Direccion]','$_POST[Telefono]')");
    } else if (isset($_REQUEST['del'])) {
        $conexion->exec("DELETE FROM cliente WHERE DNI=".$_POST['DNI']);
    } else {
        echo "ERROR: El DNI ya existe en la base de datos, intentelo de nuevo";
    }
}

if (isset($_REQUEST['mod'])) {
    unset($_REQUEST['mod']);
    if (isset($_REQUEST['DNI']) && $_REQUEST['DNI'] != "") {
        $conexion->exec("UPDATE cliente SET DNI = ".$_REQUEST['DNI']." WHERE cliente.DNI = ".$_REQUEST['ogDNI']);
        unset($_REQUEST['ogDNI']);
        foreach ($_REQUEST as $dato => $valor) {
            if ($valor != "" && $dato != "DNI") {
                $conexion->exec("UPDATE cliente SET $dato = '$valor' WHERE cliente.DNI = ".$_REQUEST['DNI']);
            }   
        }
    } else {
        foreach ($_REQUEST as $dato => $valor) {
            if ($valor != "" && $dato != "ogDNI") {
                $conexion->exec("UPDATE cliente SET $dato = '$valor' WHERE cliente.DNI = ".$_REQUEST['ogDNI']);
            }
        }
    }
    
}

$consulta = $conexion->query("SELECT DNI, Nombre, Direccion, Telefono FROM cliente");
?>
<table border="1">
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th colspan="2">Control</th>
    </tr>
    <?php
    while ($cliente = $consulta->fetchObject()) {
    ?>
        <tr>
            <td><?= $cliente->DNI ?></td>
            <td><?= $cliente->Nombre ?></td>
            <td><?= $cliente->Direccion ?></td>
            <td><?= $cliente->Telefono ?></td>
            <td>
            <form action="" method="post">
                <input type="hidden" name="del">
                <input type="hidden" name="DNI" value="<?= $cliente->DNI ?>">
                <input type="submit" value="Eliminar">
            </form>
            <form action="ej1mod.php" method="post">
                <input type="hidden" name="DNI" value="<?= $cliente->DNI ?>">
                <input type="submit" value="Modificar">
            </form></td>
        </tr>
    <?php
    }
    ?>
    <form action="" method="post">
        <tr>
            <td><input type="number" name="DNI" max="9999999999" required></td>
            <td><input type="text" name="Nombre" maxlength="20"></td>
            <td><input type="text" name="Direccion" maxlength="30"></td>
            <td><input type="number" name="Telefono" max="99999999999"></td>
            <td><input type="submit" value="Añadir"></td>
        </tr>
    </form>
</table>
<br>
<!-- Número de clientes: <?= $consulta->rowCount() ?> -->
<?php $conexion = null; //Cerramos la conexión a la BD?>

<body>

</body>

</html>