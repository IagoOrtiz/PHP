<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<body>
    <form action="ej9.php" method="post">
        <input type="text" name="text" placeholder="Introduzca frase">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            $arr = str_split($_REQUEST['text'], 1);
            $inv = "";
            for ($i=count($arr)-1; $i >= 0; $i--) { 
                $inv = $inv.$arr[$i];
            }
            echo $inv;
        }
    ?>
</body>
</html>