<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<style>
    * {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    h1 {
        text-align: center;
    }

    .table {
        margin: 30px auto;
        width: 1000px;
    }

    table {
        border-collapse: collapse;
        text-align: center;
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

    input[value="Entrada"], input[value="Salida"]{
        background-color: blue;
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
<h1>GESTISIMAL</h1>
<?php
try {
    /* No hace falta la contraseña porque root no tiene */
    $conexion = new PDO("mysql:host=localhost;dbname=gestisimal;charset=utf8", "root");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

if (isset($_REQUEST['code']) && $_REQUEST['code'] != "" && !isset($_REQUEST['mod'])) {
    $consulta = $conexion->query("SELECT code FROM almacen WHERE code='$_POST[code]'");
    if ($consulta->rowCount() == 0) {
        $conexion->exec("INSERT INTO almacen (code, descripcion, precioCom, precioVen, stock)
        VALUES ('$_POST[code]','$_POST[descripcion]', $_POST[precioCom], $_POST[precioVen], $_POST[stock])");
    } else if (isset($_REQUEST['del'])) {
        $conexion->exec("DELETE FROM almacen WHERE code='$_POST[code]'");
    } else {
        echo "ERROR: El codigo ya existe en la base de datos, intentelo de nuevo";
    }
}

if (isset($_REQUEST['mod'])) {
    unset($_REQUEST['mod']);
    if (isset($_REQUEST['code']) && $_REQUEST['code'] != "") {
        $conexion->exec("UPDATE almacen SET code = $_REQUEST[code] WHERE code = '$_REQUEST[ogcode]'");
        unset($_REQUEST['ogcode']);
        foreach ($_REQUEST as $dato => $valor) {
            if ($valor != "" && $dato != "code") {
                $conexion->exec("UPDATE almacen SET $dato = '$valor' WHERE code = '$_REQUEST[code]'");
            }   
        }
    } else {
        $consulta = $conexion->query("SELECT stock FROM almacen WHERE code = '$_REQUEST[ogcode]'");
        $stock = $consulta->fetchObject()->stock;
        if (isset($_REQUEST['+'])) {
            $stock+=$_REQUEST['stock'];
            $conexion->exec("UPDATE almacen SET stock = $stock WHERE code = '$_REQUEST[ogcode]'");
        } else if (isset($_REQUEST['-'])) {
            if ($stock > $_REQUEST['stock']) {
                $stock-=$_REQUEST['stock'];
                $conexion->exec("UPDATE almacen SET stock = $stock WHERE code = '$_REQUEST[ogcode]'");
            } else {
                echo "No se puede sacar mas stock del que existe";
            }
            
        } else {
            foreach ($_REQUEST as $dato => $valor) {
                if ($valor != "" && $dato != "ogcode") {
                    $conexion->exec("UPDATE almacen SET $dato = '$valor' WHERE code = '$_REQUEST[ogcode]'");
                }
            }
        }  
    }
}

$consulta = $conexion->query("SELECT code, descripcion, precioCom, precioVen, stock FROM almacen");
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
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Precio Compra</th>
        <th>Precio Venta</th> 
        <th>Margen</th> 
        <th>Stock</th>
        <th colspan="2">Control</th>
    </tr>
    <?php
    $i = 0;
    while ($almacen = $consulta->fetchObject()) {
        if ($i >= $page && $i < $page+10) {
    ?>
        <tr>
            <td><?= $almacen->code ?></td>
            <td><?= $almacen->descripcion ?></td>
            <td><?= $almacen->precioCom ?></td>
            <td><?= $almacen->precioVen ?></td>
            <td><?= ($almacen->precioVen - $almacen->precioCom)?></td>
            <td><?= $almacen->stock ?></td>
            <td>
            <form action="" method="post">
                <input type="hidden" name="del">
                <input type="hidden" name="code" value="<?= $almacen->code ?>">
                <input type="submit" value="Eliminar">
            </form>
            <form action="ej4mod.php" method="post">
                <input type="hidden" name="code" value="<?= $almacen->code ?>">
                <input type="submit" value="Modificar">
            </form></td>
            <td>
            <form action="ej4stAdd.php" method="post">
                <input type="hidden" name="code" value="<?= $almacen->code ?>">
                <input type="submit" value="Entrada">
            </form>
            <form action="ej4stRmv.php" method="post">
                <input type="hidden" name="code" value="<?= $almacen->code ?>">
                <input type="submit" value="Salida">
            </form></td>
        </tr>
    <?php
        }
        $i++;
    }
    ?>
    <form action="" method="post">
        <tr>
            <td><input type="text" name="code" maxlength="4" required></td>
            <td><input type="text" name="descripcion"></td>
            <td><input type="number" name="precioCom" max="8388607"></td> <!-- Mediumint -->
            <td><input type="number" name="precioVen" max="8388607"></td>
            <td></td>
            <td><input type="number" name="stock" max="32767"></td> <!-- Smallint -->
            <input type="hidden" name="page" value=<?=$page?>>
            <td colspan="2"><input type="submit" value="Añadir"></td>
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