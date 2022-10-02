<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>

<body>
    <?php
    $cont = 0;
    for ($i = 0; $i < 10; $i++) {
        echo '<tr>';
        for ($j = 0; $j < 10; $j++) {
            $cont++;
            echo '<td><a href="Ej5.php?num=' . $cont . '"><img src=';
            if (isset($_REQUEST['num']) && $_REQUEST['num'] == $cont) {
                echo '"Images/dancedog.gif"';
            } else {
                echo '"Images/dog.jfif"';
            }
            echo ' height="70px" width="70px"></a></td>';
        }
        echo '</tr><br>';
    }
    ?>
</body>

</html>