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
    session_start();
    if (!isset($_SESSION['animales'])) {
        $_SESSION['animales'] = array();
        $_SESSION['fecha'] = date("d/m/Y", time());
    } else if (isset($_REQUEST['nom'])) {
        $_SESSION['animales'][$_REQUEST['nom']] = array("especie" => $_REQUEST['especie'], "edad" => $_REQUEST['edad']);
    } else if (isset($_REQUEST['send'])) {
        $archivo = fopen("ficheros/mascotas.txt", "a");
        /* Sacamos todas las lineas del fichero y dejamos las que contienen fecha */
        $lineas = file("ficheros/mascotas.txt");
        $fecha = array();
        foreach ($lineas as $linea) {
            if (str_starts_with($linea, "#")) {
                $fecha[] = $linea;
            }
        }

        /* Sacamos la fecha más reciente y la comparamos con la fecha actual */
        $fecha = array_pop($fecha);
        if ("#".$_SESSION['fecha']."#".PHP_EOL != $fecha) {
            fwrite($archivo, "#".$_SESSION['fecha']."#".PHP_EOL);
        }

        /* Introducimos los datos de los animales */
        foreach ($_SESSION['animales'] as $nombre => $datos) {
            fwrite($archivo, "$nombre-".$datos['especie']."-".$datos['edad'].PHP_EOL);
        }

        fclose($archivo);

        $_SESSION['animales'] = array();
    }
    ?>
    <h1>Veterinaria Kindred</h1>
    <div class="tabla">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Edad</th>
            </tr>
            <?php
            foreach ($_SESSION['animales'] as $nombre => $datos) {
            ?>
                <tr>
                    <td><?= $nombre ?></td>
                    <td><?= $datos['especie'] ?></td>
                    <td><?= $datos['edad'] ?></td>
                </tr>
            <?php
            }
            ?>
            <form action="" method="post">
                <tr>
                    <td><input type="text" name="nom" required></td>
                    <td><input type="text" name="especie" required></td>
                    <td><input type="number" name="edad" min=0 required></td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" value="Añadir a la lista"></td>
                </tr>
            </form>
        </table>
        <form action="" method="post">
            <input type="hidden" name="send">
            <input type="submit" value="Enviar al fichero">
        </form>
    </div>
</body>

</html>