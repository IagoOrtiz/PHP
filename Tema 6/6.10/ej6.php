<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <form action="ej6.php" method="post">
        <input type="number" name="años" placeholder="Años" required>
        <input type="number" name="meses" placeholder="Meses" required>
        <input type="number" name="dias" placeholder="Dias" required>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['años'])) {
            echo date ("d \d\\e\l m \d\\e Y", strtotime("+".$_REQUEST['años']." years ".$_REQUEST['meses']." months ".$_REQUEST['dias']." days"));
        }
    ?>
</body>
</html>