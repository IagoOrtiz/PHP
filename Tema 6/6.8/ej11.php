<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 11</title>
</head>
<body>
    <form action="ej11.php" method="post">
        <input type="text" name="text" placeholder="Introduzca Nº Romano">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            $string = trim($_REQUEST['text']);
            $string = strtoupper($string);
            $string = str_split($string, 1);
            $suma = 0;
            $incorrecto = false;
            foreach ($string as $c) {
                switch ($c) {
                    case 'M':
                        $suma += 1000;
                        break;
                    case 'D':
                        $suma += 500;
                        break;
                    case 'C':
                        $suma += 100;
                        break;
                    case 'L':
                        $suma += 50;
                        break;
                    case 'X':
                        $suma += 10;
                        break;
                    case 'I':
                        $suma += 1;
                        break;   
                    default:
                        $incorrecto = true;
                        break;
                }
            }

            if ($incorrecto) {
                echo "Algún valor introducido no es correcto";
            } else {
                echo "La suma total es de ".$suma;
            }
            
        }
    ?>
</body>
</html>