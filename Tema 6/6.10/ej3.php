<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <form action="ej3.php" method="post">
        <input type="date" name="fecha">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['fecha'])) {
            $dia = date("w", strtotime($_REQUEST['fecha']));
            $sem = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");
            echo $sem[$dia];
        }
    ?>
</body>
</html>