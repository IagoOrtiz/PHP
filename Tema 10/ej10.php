<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 10</title>
</head>
<?php
    include_once "ej10bombilla.php";    
    session_start();

    if (!isset($_SESSION['casa'])) {
        $_SESSION['casa'] = array();
    } elseif (isset($_REQUEST['potencia'])) {
        $_SESSION['casa'][] = new Bombilla(intval($_REQUEST['potencia']), $_REQUEST['ubicacion']);
    } elseif (isset($_REQUEST['num'])) {
        $_SESSION['casa'][$_REQUEST['num']]->interruptor();
    } elseif (isset($_REQUEST['apaga'])) {
        Bombilla::interruptorGeneral();
    }

    if (count($_SESSION['casa'])>0) {
        $encendidas = 0;

        foreach ($_SESSION['casa'] as $bombilla) {
            if ($bombilla->estaEncendida()) {
                $encendidas++;
            }
        }

        $luz = (1/count($_SESSION['casa']))*$encendidas;

        if (!Bombilla::getInterruptorGeneral()) {
            $luz = 0;
        }
    }

    if (!isset($luz)) {
        $luz = 1;
    }
?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Courier New', Courier, monospace;
    }

    body {
        background-color: black;
    }

    .container {
        width: 100vw;
        height: 100vh;
        padding: 20px;
        background-color: rgba(255, 255, 255, <?=$luz?>);
        text-shadow: 0 0 5px white;
        <?php
            if ($luz <= 0.25) {
                echo "color: white;";
            }
        ?>
    }

    .nueva {
        background-color: white;
        border: 1px solid black;
        color: black;
        padding: 10px;
        width: 300px;
        box-shadow: 0 0 5px white;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    
</style>
<body>
    <div class="container">
        <h2>Bienvenido a casa</h2>
        <div class="nueva">
            <h3>Nueva bombilla</h3><br>
            <form action="" method="post">
                Potencia <input type="number" name="potencia"><br>
                Lugar <input type="text" name="ubicacion"><br><br>
                <input type="submit" value="Añadir">
            </form>
        </div>
        <?php
        for ($i=0; $i < count($_SESSION['casa']); $i++) {
        ?>
        <form action="" method="post">
        <input type="hidden" name="num" value=<?=$i?>>
        <p><?=$_SESSION['casa'][$i]?> <input type="submit" value="Interruptor"></p>
        </form>
        <?php
        }
        ?>
        
    </div>
</body>
</html>