<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Animales</title>
</head>

<style>
    * {
        text-align: center;
    }
    div {
        background-color: aquamarine;
        border: 1px solid black;
        padding: 10px;
        margin: 20px auto;
        width: 700px
    }
    
    table {
        margin: 10px auto 10px auto;
        border-collapse: collapse;
    }

    table * {
        margin: 5px;
    }

    td, th {
        border: 1px solid black;
        margin: 5px;
        background-color: greenyellow;
    }
</style>

<body>
    <?php
    $lineas = file("ficheros/mascotas.txt");
    $flag = false;
    $animales = array();
    foreach ($lineas as $linea) {
        if ($linea == $_REQUEST['fecha']) {
            $flag = true;
        } else if ($flag && !(str_starts_with($linea, "#"))) {
            $animales[] = explode("-", $linea);
        } else {
            if ($flag) {
                break;
            }
        }
    }
    ?>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Especie</th>
            <th>Edad</th>
        </tr>
        <?php
        foreach ($animales as $datos) {
        ?>
            <tr>
                <td><?= $datos[0] ?></td>
                <td><?= $datos[1] ?></td>
                <td><?= $datos[2] ?></td>
            </tr>
        <?php
        }
        ?>
        <form action="ej2.php" method="post">
            <tr>
                <td colspan="3"><input type="submit" value="Volver"></td>
            </tr>
        </form>
    </table>
</body>

</html>