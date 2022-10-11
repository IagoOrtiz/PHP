<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envío exitoso</title>
</head>
<body>
    <h1>Pizzeria Sans Undertale</h1>
    ________________________________________________________________________________________________________<br><br>
    Se enviará el pedido a tu dirección que contiene:<br><br>
    <?php
        $arr = unserialize($_REQUEST['arr']);
        for ($i=0; $i < count($arr); $i++) { 
            if (!isset($arr[$i][1])) {
                echo '- '.$arr[$i][0].' simple.';
            } else {
                echo '- '.$arr[$i][0].' con ';
                for ($j=1; $j < count($arr[$i]); $j++) { 
                    echo $arr[$i][$j];
                    if ($j != count($arr[$i])-1) {
                        echo ', ';
                    } else {
                        echo '.';
                    }
                }
            }
            echo '<br>';
        }
    ?>
    <br>
    <form action="Ej2.php">
        <input type="submit" value="Realizar otro pedido">
    </form>
</body>
</html>