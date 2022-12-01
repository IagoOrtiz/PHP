<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 9</title>
</head>
<style>
    table, table * {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
        text-align: center;
    }

    .masCaro {
        border: 1px solid black;
        margin: 10px;
    }
</style>
<body>
    <?php
        include_once "ej9cocheLujo.php";
        session_start();

        if (isset($_SESSION['masCaro'])) {
            Coche::setModeloCaro($_SESSION['masCaro']['Modelo']);
            Coche::setPrecioCaro($_SESSION['masCaro']['Precio']);
        }

        if (!isset($_SESSION['coches'])) {
            $_SESSION['coches'] = array();
        } else if (isset($_REQUEST['suplemento']) && $_REQUEST['suplemento'] != '') {
            $_SESSION['coches'][] = new CocheLujo($_REQUEST['matricula'], $_REQUEST['modelo'], intval($_REQUEST['precio']), $_REQUEST['suplemento']);
        } else if (isset($_REQUEST['matricula'])) {
            $_SESSION['coches'][] = new Coche($_REQUEST['matricula'], $_REQUEST['modelo'], intval($_REQUEST['precio']));
        }

        $_SESSION['masCaro'] = Coche::masCaro();
        
    ?>
    <div class="masCaro">
        <h2>Modelo más caro: <?=$_SESSION['masCaro']['Modelo']?></h2>
        <h2>Precio: <?=$_SESSION['masCaro']['Precio']?> €</h2>
    </div>
    <table>
        <tr>
            <th>Matricula</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Suplemento</th>
        </tr>
        <?php
            foreach ($_SESSION['coches'] as $coche) {
                echo $coche;
            }
        ?>
        <form action="" method="post">
            <tr>
                <td><input type="text" name="matricula" required></td>
                <td><input type="text" name="modelo" required></td>
                <td><input type="number" name="precio" required></td>
                <td><input type="number" name="suplemento" placeholder="Solo coches de lujo"></td>
            </tr>
            <tr>
                <td colspan="4"><input type="submit" value="Añadir"></td>
            </tr>
        </form>
    </table>
</body>
</html>