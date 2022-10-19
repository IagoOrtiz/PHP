<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<body>
    <form action="ej8.php" method="post">
        <input type="text" name="text" placeholder="Introduzca frase">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            $string = $_REQUEST['text'];
            $arr = str_split($string, 1);
            $ascii = array();
            echo "Ascii: ";
            foreach ($arr as $c) {
                $c = ord($c);
                $ascii[] = $c;
                echo $c;
            }
            echo "<br>Original: ";
            foreach ($ascii as $c) {
                $c = chr($c);
                echo $c;
            }
        }
    ?>
</body>
</html>