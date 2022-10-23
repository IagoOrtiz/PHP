<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <h1>Introduzca una fecha</h1>
    <form action="ej1.php" method="post">
        <input type="text" name="dia" required placeholder="Día (Mes)">
        <input type="text" name="mes" required placeholder="Mes">
        <input type="text" name="año" required placeholder="Año"><br><br>
        Formato<br>
        <select name="format">
            <option value="d/m/Y">Dia/Mes/Año</option>
            <option value="m-d-Y">Mes-Dia-Año</option>
            <option value="d \d\e\l m">Dia del Mes</option>
        </select><br><br>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
    if (isset($_REQUEST['format'])) {
        $dia = $_REQUEST['dia'];
        $año = $_REQUEST['año'];
        switch (strtoupper($_REQUEST['mes'])) {
            case 'ENERO':
            case 'ENE':
                $mes = 1;
                break;
            case 'FEBRERO':
            case 'FEB':
                $mes = 2;
                break;
            case 'MARZO':
            case 'MAR':
                $mes = 3;
                break;
            case 'ABRIL':
            case 'ABR':
                $mes = 4;
                break;
            case 'MAYO':
            case 'MAY':
                $mes = 5;
                break;
            case 'JUNIO':
            case 'JUN':
                $mes = 6;
                break;
            case 'JULIO':
            case 'JUL':
                $mes = 7;
                break;
            case 'AGOSTO':
            case 'AGO':
                $mes = 8;
                break;
            case 'SEPTIEMBRE':
            case 'SEP':
                $mes = 9;
                break;
            case 'OCTUBRE':
            case 'OCT':
                $mes = 10;
                break;
            case 'NOVIEMBRE':
            case 'NOV':
                $mes = 11;
                break;
            case 'DICIEMBRE':
            case 'DIC':
                $mes = 12;
                break;
            default:
                $mes = $_REQUEST["mes"];
                break;
            }
                if (checkdate($mes, $dia, $año)) {
                    $fecha = date($_REQUEST['format'], strtotime($mes . "/" . $dia . "/" . $año));
                    echo $fecha;
                } else {
                    echo "Fecha introducida incorrectamente, intentelo de nuevo";
                }
        }
    ?>
</body>

</html>