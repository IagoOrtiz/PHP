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
        <textarea name="text" placeholder="Introduzca un parrafo con dos lineas separadas por un punto."></textarea><br>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            $string = trim($_REQUEST['text']);
            $string = explode(".",$string);
            $linea1 = trim($string[0]);
            $linea1 = explode(" ", $linea1);
            $linea2 = trim($string[1]);
            $linea2 = explode(" ", $linea2);

            foreach ($linea1 as $c) {
                if ($c == "") {
                    unset($c);
                }
            }
            foreach ($linea2 as $c) {
                if ($c == "") {
                    unset($c);
                }
            }
            echo "La primera frase tiene ".count($linea1)." palabras<br>";
            echo "La segunda frase tiene ".count($linea2)." palabras";
        }
    ?>
</body>
</html>