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
        <input type="text" name="text" placeholder="Introduzca frase">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            $string = trim($_REQUEST['text']);
            $arr = str_split($string, 1);
            do {
                $aux = $arr[0];
                for ($i=0; $i < count($arr)-1; $i++) { 
                    $arr[$i]=$arr[$i+1];
                    echo $arr[$i];
                }
                $arr[count($arr)-1] = $aux;
                echo $arr[count($arr)-1]."<br>";
            } while (implode($arr)!=$string);
        }
    ?>
</body>
</html>