<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form action="ej4.php" method="post">
        <input type="date" name="fecha">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['fecha'])) {
            $fecha = date("d \d\\e\l m \d\\e Y", strtotime($_REQUEST['fecha']));
            echo $fecha;
        }
    ?>
</body>
</html>