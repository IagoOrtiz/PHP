<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
    <?php
        if (isset($_REQUEST['num'])) {
            $num = $_REQUEST['num'];
            header("refresh: 2; url=Ej3.php");
        }
    ?>
<body>
    <h1>Descubre la imagen oculta</h1>
    <table>        
        <tbody>
            <?php
            $cont = 0;
                for ($i=0; $i < 3; $i++) { 
                    echo '<tr>';
                    for ($j=0; $j < 3; $j++) {
                        $cont++; 
                        echo '<td><a href="Ej3.php?num='.$cont.'"><img src=';
                        if (isset($num) && $num == $cont) {
                            echo '"Images/'.$cont.'.jpg"';
                        } else {
                            echo '"Images/oculto.jpg"';
                        }
                        echo '</a></td>';
                    }
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
    <form action="Ej3Resultado.php" method="POST">
        <input type="hidden" name="intentos" value=<?php 
        if (isset($_REQUEST['intentos'])) {
            echo $_REQUEST['intentos'];
        } else {
            echo 0;
        }?>>
        <input type="text" name="res"> <input type="submit" value="Comprobar">
    </form>
    
</body>

</html>