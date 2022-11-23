<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<style>
    * {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .table {
        margin: 30px auto;
        width: 750px;
    }

    table {
        border-collapse: collapse;
        text-align: center;
        width: 750px;
    }

    table * {
        margin: 2px;
    }

    input[value="Añadir"] {
        background-color: lime;
        border-radius: 2px;
        border: none;
        padding: 5px;
        width: 100px;
    }

    input[value="Eliminar"] {
        background-color: red;
        border-radius: 2px;
        border: none;
        padding: 5px;
        width: 100px;
    }
    input[value="Modificar"] {
        background-color: yellow;
        border-radius: 2px;
        border: none;
        padding: 5px;
        width: 100px;
    }

    .pages {
        margin: 0 auto;
        width: 750px;
        text-align: center;
    }

    .pages * {
        position: relative;
        display: inline;
    }
</style>
<body>
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
if (isset($_REQUEST['page'])) {
    $page = $_REQUEST['page'];
} else {
    $page = 0;
}
?>
<div class="container">

<div class="table">
<table border="1">
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th colspan="2">Control</th>
    </tr>
    <?php
    $i = 0;
    while ($cliente = $consulta->fetchObject()) {
        if ($i >= $page && $i < $page+10) {
    ?>
        <tr>
            <td><?= $cliente->DNI ?></td>
            <td><?= $cliente->Nombre ?></td>
            <td><?= $cliente->Direccion ?></td>
            <td><?= $cliente->Telefono ?></td>
            <td>
            <form action="ej2del.php" method="post">
                <input type="hidden" name="DNI" value="<?= $cliente->DNI ?>">
                <input type="submit" value="Eliminar">
            </form>
            <form action="ej2mod.php" method="post">
                <input type="hidden" name="DNI" value="<?= $cliente->DNI ?>">
                <input type="submit" value="Modificar">
            </form></td>
        </tr>
    <?php
        }
        $i++;
    }
    ?>
    <form action="" method="post">
        <tr>
            <td><input type="number" name="DNI" max="9999999999" required></td>
            <td><input type="text" name="Nombre" maxlength="20"></td>
            <td><input type="text" name="Direccion" maxlength="30"></td>
            <td><input type="number" name="Telefono" max="99999999999"></td>
            <input type="hidden" name="page" value=<?=$page?>>
            <td><input type="submit" value="Añadir"></td>
        </tr>
    </form>
</table>
</div>
<div class="pages">
<?php
    if ($page >= 10) {
        ?>
        <form action="">
            <input type="hidden" name="page" value=<?=$page-10?>>
            <input type="submit" value="Anterior">
        </form>
        <?php
    }

    if ($page+10 < $consulta->rowCount()) {
        ?>
        <form action="">
            <input type="hidden" name="page" value=<?=$page+10?>>
            <input type="submit" value="Siguiente">
        </form>
        <?php
    }
?>
</div>
<br>
<?php $conexion = null; //Cerramos la conexión a la BD?>

</body>

</html>