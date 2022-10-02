<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $intentos = $_REQUEST['intentos']+1;
        if ($_REQUEST['res'] == "amogus"||$_REQUEST['res'] == "among us") {
            echo '<h1>Respuesta correcta ඞ</h1><br>Encontraste la respuesta en '.$intentos.' intentos.<br><img src="Images/amogus.jpg" alt="Amogus">';
            echo '<form action="Ej3.php" method="POST">
                <input type="hidden" name="intentos" value="0">
                <input type="submit" value="Volver">
            </form>';
        } else {
            echo '<h1>Respuesta incorrecta, intentelo de nuevo</h1>';
            echo '<form action="Ej3.php" method="POST">
                <input type="hidden" name="intentos" value="'.$intentos.'">
                <input type="submit" value="Volver">
            </form>';
        }
    ?>
</body>
</html>