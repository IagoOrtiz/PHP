<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Concesionario Kachow</title>
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
        margin: 15px;
        background-color: palevioletred;
        box-shadow: 4px 4px 4px gray;
        margin: 30px auto;
    }

    table * {
        border-bottom: 1px solid black;
        padding: 10px;
    }

    form {
        border: none;
    }

    div {
        border: 1px solid black;
        margin: 10px;
    }

    div * {
        padding: 5px;
    }
</style>
<body>
<table>
        <tr>
            <th>Matricula</th>
            <th>Fecha</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Extras</th>
        </tr>
        <?php
            session_start();
            foreach ($_SESSION['coches'] as $matricula => $datos) {
                if ($datos['tipo'] == $_REQUEST['tipo']) {
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
            }
        ?>
        <tr>

            <td><form action="ejercicio2.php">
            <input type="submit" value="Volver">
            </form></td>
        
        </tr>
        
    </table><br>

    
</body>
</html>