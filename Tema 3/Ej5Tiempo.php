<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5 Tiempo</title>
</head>
<body>
    <?php
        $vol = (($_REQUEST['D']/2)*($_REQUEST['D']/2)) * 3.14 * $_REQUEST['A'];
        $time = $vol / $_REQUEST['L'];
        echo "Se tardarán ".$time." segundos en llenar el deposito";
    ?>
</body>
</html>