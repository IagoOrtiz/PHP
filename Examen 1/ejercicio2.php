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
        float:left;
    }

    .tabla {
        float: left;
    }

    table * {
        padding: 5px;
    }

    td, th {
        border-bottom: 1px solid black;
    }

    div {
        border: 1px solid black;
        float: right;
        margin: 10px;
        background: palevioletred;
        box-shadow: 4px 4px 4px gray;
    }

    div * {
        padding: 5px;
    }

    .delete {
        margin-top: 5px;
        border: none;
        float: left;
        box-shadow: none;
    }
</style>
<body>
    <h1>Concesionarios Kachow</h1>
    ________________________________________________<br><br>
    <?php
        session_start();

        /* Creamos el array de coches o recojemos el anterior si existe */
        /* Si se ha mandado la orden de resetear el concesionario se reinicia la cookie y la sesión */

        if (isset($_REQUEST['reset'])) {
            setcookie('coches', "", time()-1);
            $_SESSION['coches'] = array();
        } else {
            if (!isset($_SESSION['coches'])) {
                if (isset($_COOKIE['coches'])) {
                    $_SESSION['coches'] = unserialize($_COOKIE['coches']);
                } else {
                    $_SESSION['coches'] = array();
                }
            } 
        }

        /* Introducimos los tipos */
        $tipos = array("Turismo", "Berlina", "Monovolumen", "Deportivo", "Furgoneta");

        /* Añadimos los datos del coche */
        if (isset($_REQUEST['new'])) {
            do {
                $mat = rand(100, 999)."-".substr(strtoupper($_REQUEST['marca']), strlen($_REQUEST['marca'])-3, strlen($_REQUEST['marca']));
            } while (isset($_SESSION['coches'][$mat]));
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

            $_SESSION['coches'][$mat] = array("fecha" => strtotime('now'), "marca" => $_REQUEST['marca'], 'tipo' => $_REQUEST['tipo'], 'extras' => $extras);
        }

        /* Si se ha introducido un extra se añade aquí */
        if (isset($_REQUEST['addExtra'])) {
            $_SESSION['coches'][$_REQUEST['mat']]['extras'][] = $_REQUEST['addExtra'];
        }

        /* Y aquí se actualiza la información en la cookie */
        setcookie("coches", serialize($_SESSION['coches']), strtotime("+1 year"));
    ?>
    <div class="tabla">
    <table>
        <tr>
            <th>Matricula</th>
            <th>Fecha</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th colspan="2">Extras</th>
        </tr>
        <?php
        /* Por cada coche introducido en el concesionario se crea una linea en la tabla con sus datos */
            foreach ($_SESSION['coches'] as $matricula => $datos) {
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
                    <td><form action="" method="post">
                        <input type="text" placeholder="Introduzca extra" name="addExtra" required>
                        <input type="hidden" name="mat" value=<?=$matricula?>>
                        <input type="submit" value="Añadir extra">
                    </form></td>
                </tr>
                <?php
            }
        ?>
    </table><br><br>
    <div class="delete">
        <form action="" method="post">
            <input type="hidden" name="reset">
            <input type="submit" value="Borrar todos los coches">
        </form>
    </div>
    
    </div>
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
            <input type="hidden" name="new">
            <input type="submit" value="Añadir">
        </form>
    </div>

    <div>
        <h3>Consultar coches de una categoria</h3>
        <form action="consulta.php" method="POST">
            <select name="tipo">
                <?php
                    foreach ($tipos as $tipo) {
                        ?>
                        <option value="<?=$tipo?>"><?=$tipo?></option>
                        <?php
                    }
                ?>
            </select>
            <input type="submit" value="Consultar">
        </form>
    </div>
</body>
</html>