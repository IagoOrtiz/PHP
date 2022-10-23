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
        <input type="text" name="n1" placeholder="Persona 1">
        <input type="date" name="p1"><br><br>
        <input type="text" name="n2" placeholder="Persona 2">
        <input type="date" name="p2"><br><br>
        <input type="submit" value="Enviar">
    </form><br>
    <?php
        if (isset($_REQUEST['n1'])) {
            $p1 = array($_REQUEST['n1'], floor((time() - strtotime($_REQUEST['p1']))/(60*60*24*365.25)));
            $p2 = array($_REQUEST['n2'], floor((time() - strtotime($_REQUEST['p2']))/(60*60*24*365.25)));
            echo $p1[0].", ".$p1[1]." años.<br>";
            echo $p2[0].", ".$p2[1]." años.<br>";
            if ($p1[1] > $p2[1]) {
                echo "El mayor es ".$p1[0];
            } else {
                echo "El mayor es ".$p2[0];
            }
        }
    ?>
</body>
</html>