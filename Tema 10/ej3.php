<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<style>
    * {
        font-size: 1.25em;
    }
</style>
<body>
    <?php
        include 'ej3cubo.php';
        $c1 = new Cubo(7, 5);
        echo "Cubo 1:<br>$c1<br>";
        $c2 = new Cubo(10, 3);
        echo "Cubo 2:<br>$c2<br>";
        echo "Vertemos el contenido del cubo 1 en el cubo 2<br>";
        $c1->verterEn($c2);
        echo "Cubo 1:<br>$c1<br>";
        echo "Cubo 2:<br>$c2<br>";
        echo "Vertemos el contenido del cubo 2 en el cubo 1<br>";
        $c2->verterEn($c1);
        echo "Cubo 1:<br>$c1<br>";
        echo "Cubo 2:<br>$c2<br>";
    ?>
</body>
</html>