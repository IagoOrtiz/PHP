<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Cilindro</title>
</head>
<body>
    <h1>Calculo del volúmen de un cilindro</h1> <br>
    <img src="https://cdn-icons-png.flaticon.com/512/1200/1200830.png" alt="Cilindro"><br><br>
    <?php
        $vol = $_GET['Diametro'] * $_GET['Altura'] * 3.14;
        echo "El volumen es $vol";
    ?>
</body>
</html>