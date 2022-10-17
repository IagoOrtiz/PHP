<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<style>
    fieldset {
        border: none;
    }
    table {
        text-align: center;
        font-size: 1.5em;
        width: 300px;
        height: 300px;
    }
    a, h1 {
        margin-left: 20px;
    }
</style>
<?php
    include("controlAcceso.php");
?>
<body>
    <h1>Control de entrada</h1>
        <form action="ej2acceso.php" method="post">
            <?php
                $nR = rand(1,5);
                $lR = rand(0,4);
                switch ($lR) {
                    case 0:
                        $comb = $nR."A";
                        break;
                    case 1:
                        $comb = $nR."B";
                        break;
                    case 2:
                        $comb = $nR."C";
                        break;
                    case 3:
                        $comb = $nR."D";
                        break;
                    case 4:
                        $comb = $nR."E";
                        break;
                    default:
                        $comb = $nR."0";
                        break;
                }
                imprimeTarjeta();
            ?>
            <fieldset>
                <input type="radio" name="tipo" value="Administrador"><label>Administrador</label>
                <input type="radio" name="tipo" value="Usuario"><label>Usuario</label>
            </fieldset>
            <a>Introduzca la clave <?php echo $comb?> para acceder.</a>
            <input type="hidden" name="clave" value="<?php echo $comb?>">
            <input type="submit" value="Enviar">
        </form>
</body>
</html>