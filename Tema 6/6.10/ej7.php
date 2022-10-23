<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body> 

    <form action="ej7.php" method="post">
        Fecha nacimiento:
        <input type="date" name="birth"><br><br>
        Fecha futura:
        <input type="date" name="year"><br><br>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['birth'])) {
            $birth = strtotime($_REQUEST['birth']);
            $ftr = strtotime($_REQUEST['year']);
            $years = floor(($ftr - $birth)/(60*60*24*365.25));
            echo "En la fecha futura tendrás $years años.";
        }
    ?>
</body>
</html>