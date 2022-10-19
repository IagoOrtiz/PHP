<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 13</title>
</head>

<body>
    <form action="ej13.php" method="post">
        <textarea name="text" placeholder="Introduzca un texto que termine en punto"></textarea><br>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
    $maxL = 0;
    $max = "";
    $a3 = 0;
    if (isset($_REQUEST['text'])) {
        $string = trim($_REQUEST['text']);
        if (str_ends_with($string, ".")) {
            $string = explode(" ", $string);
        
            foreach ($string as $c) {
                if ($c == "") {
                    unset($c);
                } else  {
                
                    if (strlen($c) > $maxL) {
                        $maxL = strlen($c);
                        $max = $c;
                    }

                    if (strlen($c) >= 8 && strlen($c) <= 12 && substr_count($c, "a") > 3) {
                        $a3++;
                    }
                }
            }

            $string = implode(" ", $string);
            echo $string."<br>";

            echo "Palabra más larga en la posición ". strpos($string, $max). " con ". $maxL . " caracteres.<br>";
            echo "Palabras entre 8 y 12 letras con 3 o más 'A's: ". $a3;

        } else {
            echo "El texto no termina en punto.";
        }
    }
    ?>
</body>

</html>