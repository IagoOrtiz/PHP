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
        <input type="text" name="text" placeholder="Introduzca frase">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            $string = trim($_REQUEST['text']);
            $string = explode(" ",$string);
            if ($string[0] == $string[count($string)-1]) {
                echo "La frase comienza y termina con la misma palabra";
            } else {
                echo "La frase no comienza y termina con la misma palabra";
            }
            
        }
    ?>
</body>
</html>