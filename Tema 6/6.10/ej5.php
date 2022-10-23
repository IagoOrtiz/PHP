<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <form action="ej5.php" method="post">
        <select name="dia">
            <option value="Monday">Lunes</option>
            <option value="Tuesday">Martes</option>
            <option value="Wednesday">Miercoles</option>
            <option value="Thursday">Jueves</option>
            <option value="Friday">Viernes</option>
            <option value="Saturday">Sabado</option>
            <option value="Sunday">Domingo</option>
        </select>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['dia'])) {
            echo date ("d \d\\e\l m", strtotime("next ".$_REQUEST['dia']));
        }
    ?>
</body>
</html>