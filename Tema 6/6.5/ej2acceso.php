<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
</head>
<body>
    <?php
        include("controlAcceso.php");
        if (compruebaClave($_REQUEST['valor'], $_REQUEST['clave'])) {
            ?>
            Clave introducida correctamente, bienvenido
            <?php
            echo $_REQUEST['tipo'].".";
        } else {
            ?>
            Clave incorrecta, intentelo de nuevo.
            <?php
        }
    ?>
</body>
</html>