<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<style>
    .container {
        border: 1px solid black;
        background-color: white;
        width: 500px;
        position: relative;
        left: 50%;
        margin-left: -250px;
        text-align: center;
        padding-bottom: 20px;
    }

    table {
        text-align: center;
        margin: 20px auto;
        width: 200px;
    }

    tr *{
        height: 17px;
        margin: 1px;
        border: 1px solid black;
    }

    td {
        border: none;
    }
<?php
    if (isset($_REQUEST['bg'])) {
        $bg = $_REQUEST['bg'];
        setcookie("bg", $bg, time() + 60*60*24*30);
        if (!isset($_REQUEST['clear'])) {
            if (isset($_COOKIE['palet'])) {
                $palet = unserialize(($_COOKIE['palet']));
            } else {
                $palet = array();
            }
            $palet[] = $bg;
            setcookie("palet", serialize($palet), time() + 60*60*24*30);
        }
    } else if (isset($_COOKIE['bg'])) {
        $bg = $_COOKIE['bg'];
    }

    if (isset($_REQUEST['clear'])) {
        setcookie("palet", "", time() + 60*60*24*30);
    }

    if (isset($_REQUEST['bg']) || isset($_COOKIE['bg'])) {
        ?>
    body {
        background-color: <?=$bg?>;
    }
        <?php
    }

    foreach ($palet as $i => $color) {
        echo ".d$i {\n background-color: $color; \n}\n";
    }


?>

</style>
<body>
    <div class="container">
        <h1>Generador de paletas aleatorias</h1>
        <form action="#" method="post">
            <input type="hidden" name="bg" value="<?='rgb('.rand(0,255).','.rand(0,255).','.rand(0,255).')'?>">
            <input type="submit" value="Generar color">
        </form><br>
        <form action="#" method="post">
            <input type="hidden" name="clear">
            <input type="submit" value="Limpiar historial">
        </form>
        <table>
            <tbody>
                <tr>
                    <th>Paleta</th>
                </tr>
                <?php
                if (isset($palet)) {
                    foreach ($palet as $i => $color) {
                        ?>
                        <tr>
                            <td>
                                <div class="d<?=$i?>"><?=$i+1?></div>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>