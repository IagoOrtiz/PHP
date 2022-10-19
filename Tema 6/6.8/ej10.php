<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>
<body>
    <form action="ej10.php" method="post">
        <input type="text" name="text" placeholder="Introduzca nombre y apellidos">
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['text'])) {
            $string = trim($_REQUEST['text']);
            $string = explode(" ",$string);

            foreach ($string as $c) {
                if ($c == "") {
                    unset($c);
                } else {
                    $c = ucfirst($c);
                    echo($c." ");
                }
            }

            echo "<br>";

            foreach ($string as $c) {
                echo substr(ucfirst($c), 0, 1);
            }

        }
    ?>
</body>
</html>