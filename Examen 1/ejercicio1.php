<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario Kachow</title>
</head>
<style>
    * {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    body {
        background-color: lightgray;
    }
    
    table {
        border: 1px solid black;
        float:left;
        background-color: palevioletred;
        box-shadow: 4px 4px 4px gray;
    }

    table * {
        border-bottom: 1px solid black;
        padding: 5px;
    }

    div {
        border: 1px solid black;
        float: right;
        background-color: palevioletred;
        box-shadow: 4px 4px 4px gray;
    }

    div * {
        padding: 5px;
    }
</style>
<body>
    <h1>Concesionarios Kachow</h1>
    ________________________________________________<br><br>
    <?php
        /* Creamos el array de coches o recojemos el anterior si existe */
        if (!isset($_REQUEST['coches'])) {
            $coches = array();
        } else {
            $coches = unserialize($_REQUEST['coches']);
        }

        /* Introducimos los tipos */
        $tipos = array("Turismo", "Berlina", "Monovolumen", "Deportivo", "Furgoneta");

        /* Añadimos los datos del coche */
        if (isset($_REQUEST['new'])) {
            do {
                $mat = rand(100, 999)."-".substr(strtoupper($_REQUEST['marca']), strlen($_REQUEST['marca'])-3, strlen($_REQUEST['marca']));
            } while (isset($coches[$mat]));
            $flag = false;
            if (isset($_REQUEST['extras1'])) {
                $extras[] = $_REQUEST['extras1'];
                $flag = true;
            }
            if (isset($_REQUEST['extras2'])) {
                $extras[] = $_REQUEST['extras2'];
                $flag = true;
            }
            if (isset($_REQUEST['extras3'])) {
                $extras[] = $_REQUEST['extras3'];
                $flag = true;
            }
            if (!$flag) {
                $extras = array();
            }
            $coches[$mat] = array("fecha" => strtotime('now'), "marca" => $_REQUEST['marca'], 'tipo' => $_REQUEST['tipo'], 'extras' => $extras);
        }
    ?>

    <table>
        <tr>
            <th>Matricula</th>
            <th>Fecha</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Extras</th>
        </tr>
        <?php
        /* Por cada coche introducido en el concesionario se crea una linea en la tabla con sus datos */
            foreach ($coches as $matricula => $datos) {
                ?>
                <tr>
                    <td><?=$matricula?></td>
                    <?php
                        $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
                        $dia = $dias[date("w", $datos['fecha'])]
                    ?>
                    <td><?=$dia?> - <?=date("d/m/Y", $datos['fecha'])?></td>
                    <td><?=$datos['marca']?></td>
                    <td><?=$datos['tipo']?></td>
                    <td><?php foreach ($datos['extras'] as $extras) {
                        echo $extras."<br>";
                    }?></td>
                </tr>
                <?php
            }
        ?>
    </table>
    <div>
        <h3>Insertar coche nuevo</h3>
        <form action="" method="post">
            <input type="text" name="marca" placeholder="Marca" required>
            <select name="tipo">
                <?php
                    foreach ($tipos as $tipo) {
                        ?>
                        <option value="<?=$tipo?>"><?=$tipo?></option>
                        <?php
                    }
                ?>
            </select><br><br>
            <input type="checkbox" name="extras1" value="Cámara trasera">Camara trasera<br>
            <input type="checkbox" name="extras2" value="Llantas de aleación">Llantas de aleación<br>
            <input type="checkbox" name="extras3" value="Climatizador">Climatizador<br><br>
            <input type="hidden" name="coches" value="<?php echo htmlspecialchars(serialize($coches))?>">
            <input type="hidden" name="new">
            <input type="submit" value="Añadir">
        </form>
    </div>
</body>
</html>