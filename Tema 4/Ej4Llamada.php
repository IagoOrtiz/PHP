<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llamada</title>
</head>
<body>
    <?php
        echo 'Usted ha llamado al bloque '.$_REQUEST['block'].', piso '.$_REQUEST['stage'];
    ?>
</body>
</html>