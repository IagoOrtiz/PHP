<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <h1>Introduzca una hora</h1>
    <form action="ej2.php" method="post">
        <input type="text" name="hora" placeholder="Hora">
        <input type="text" name="minuto" placeholder="Minuto">
        <input type="text" name="segundo" placeholder="Segundo"><br><br>
        Formato<br>
        <select name="format">
            <option value="H:i:s">Hora:Minuto:Segundo</option>
            <option value="H-i">Hora-Minuto</option>
        </select><br><br>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
    if (isset($_REQUEST['format'])) {
        $hora = $_REQUEST['hora'];
        $min = $_REQUEST['minuto'];
        $seg = $_REQUEST['segundo'];
        if (checktime($hora, $min, $seg)) {
            $fecha = date($_REQUEST['format'], strtotime("$hora:$min:$seg"));
            echo $fecha;
        } else {
            echo "Datos introducidos erroneamente.";
        }
        
    }
    function checktime($h, $m, $s) {
        if ($h >= 0 && $h <= 24 
        && $m >= 0 && $m < 60 
        && $s >= 0 && $s < 60) {
            return true;
        } else {
            return false;
        }
    }
    ?>
</body>

</html>