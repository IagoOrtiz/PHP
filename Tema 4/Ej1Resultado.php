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
        if ($_REQUEST['res'] == "amogus"||$_REQUEST['res'] == "among us") {
            echo '<h1>Respuesta correcta ඞ</h1><br><img src="Images/amogus.jpg" alt="Amogus">';
        } else {
            echo '<h1>Respuesta incorrecta, intentelo de nuevo</h1>';
        }
    ?>
</body>
</html>