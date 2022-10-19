<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercico 7</title>
</head>
<body>
<form action="ej7.php" method="post">
        <input type="text" name="text" placeholder="Introduzca frase">
        <input type="text" name="word" placeholder="Introduzca palabra a buscar">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            //Introducimos un espacio al principio para que al encontrar la primera palabra el resultado no sea 0 (== false)
            if (strpos(" ".$_REQUEST['text'], $_REQUEST['word']) == false) {
                echo "La palabra introducida no se encuentra en la frase.";
            } else {
                echo "La palabra introducida se encuentra en la frase.";
            }
            
        }
    ?>
</body>
</html>