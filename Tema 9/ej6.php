<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<style>
    table, td, tr, th{
        border: 1px solid black;
        border-collapse: collapse;
        padding: 10px;
    }

    table {
        margin: 20px auto;
    }
</style>
<body>
<?php
    try {
        /* No hace falta la contraseña porque root no tiene */
        $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    if (isset($_REQUEST['mod'])) {
        $conexion->exec("UPDATE horario SET $_REQUEST[hora] = '$_REQUEST[clase]' WHERE dia = '$_REQUEST[dia]'");
    }
?>
    <table>
        <tr>
            <th></th>
            <th>8:00 - 9:00</th>
            <th>9:00 - 10:00</th>
            <th>10:00 - 11:00</th>
            <th>11:00 - 12:00</th>
            <th>12:30 - 13:30</th>
            <th>13:30 - 14:30</th>
        </tr>
        <?php
            $consulta = $conexion->query("SELECT dia, primera, segunda, tercera, cuarta, quinta, sexta FROM horario ORDER BY orden");
            while ($horario = $consulta->fetchObject()) {
                ?>
        <tr>
            <th><?=$horario->dia?></th>
            <td><a href="ej6cambio.php?dia=<?=$horario->dia?>&hora=primera"><?=$horario->primera?></a></td>
            <td><a href="ej6cambio.php?dia=<?=$horario->dia?>&hora=segunda"><?=$horario->segunda?></a></td>
            <td><a href="ej6cambio.php?dia=<?=$horario->dia?>&hora=tercera"><?=$horario->tercera?></a></td>
            <td><a href="ej6cambio.php?dia=<?=$horario->dia?>&hora=cuarta"><?=$horario->cuarta?></a></td>
            <td><a href="ej6cambio.php?dia=<?=$horario->dia?>&hora=quinta"><?=$horario->quinta?></a></td>
            <td><a href="ej6cambio.php?dia=<?=$horario->dia?>&hora=sexta"><?=$horario->sexta?></a></td>
        </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>