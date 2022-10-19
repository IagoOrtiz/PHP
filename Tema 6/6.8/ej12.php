<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 12</title>
</head>

<body>
    <form action="ej12.php" method="post">
        <input type="text" name="text" placeholder="Introduzca telegrama">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
    if (isset($_REQUEST['text'])) {
        $string = trim($_REQUEST['text']);
        if (str_ends_with($string, ".")) {
            $string = explode(" ", $string);
            $caracteres = 0;
            $a = 0;
            $e = 0;
            $i = 0;
            $o = 0;
            $u = 0;
            $diez = 0;
            foreach ($string as $c) {
                if (count_chars($c) > 10) {
                    $diez++;
                }
                $a += substr_count($c, "a");
                $e += substr_count($c, "e");
                $i += substr_count($c, "i");
                $o += substr_count($c, "o");
                $u += substr_count($c, "u");
                $caracteres+= strlen($c)+1;
            }
            $caracteres--;
            echo $_REQUEST['text'] . "<br>";
            echo "El telegrama tiene " . $caracteres . " caracteres, de los cuales las vocales son:<br>";
            echo "A: " . $a . "<br>";
            echo "E: " . $e . "<br>";
            echo "I: " . $i . "<br>";
            echo "O: " . $o . "<br>";
            echo "U: " . $u . "<br>";
            echo "Palabras de más de 10 caracteres: " . $diez . "<br>";
            echo "Porcentaje de espacios: " . (count($string) - 1) * 100 / $caracteres . "%.";
        } else {
            echo "El telegrama no acaba en punto.";
        }
    }
    ?>
</body>

</html>