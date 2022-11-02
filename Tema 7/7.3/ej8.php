<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 8</title>
</head>
<style>
    .container {
        margin: 0 auto;
    }
    .container *{
        margin: 0 auto;
    }

    table {
        border: 1px solid black;
        padding: 5px;
    }
    table * {
        padding-left: 10px;
        padding-right: 10px;
    }

    input {
        padding: 2px;
    }

    tr:last-child {
        text-align: center;
    }
    
    .add {
        text-align: center;
        margin-bottom: 20px;
    }

    .res {
        text-align: center;
        margin-top: 20px;
    }
</style>
<?php
    if (isset($_COOKIE['dic'])) {
        $dic = unserialize($_COOKIE['dic']);
        if (isset($_REQUEST['eng'])) {
            $dic[strtolower($_REQUEST['eng'])] = strtolower($_REQUEST['esp']);
        }
        if (isset($_REQUEST['ans'])) {
            $quest = unserialize($_REQUEST['quest']);
            $acierto = true;
            foreach ($quest as $i => $eng) {
                if ($dic[$eng] != strtolower($_REQUEST['ans'][$i])) {
                    $acierto = false;
                    break;
                }
            }
        }
    } else {
        $dic = [
            "car" => "coche",
            "cat" => "gato",
            "undeground" => "subterraneo",
            "lost" => "perdido",
            "price" => "precio"
        ];
    }
    setcookie("dic", serialize($dic), time() + 60*60*24*30);

    $quest = array_rand($dic, 5);
?>
<body>
    <div class="container">

    <form action="ej8.php" method="post">
    <table class="add">
        <tr>
            <th colspan="2">Añadir palabras</th>
        </tr>
        <tr>
            <td><input type="text" placeholder="Inglés" name="eng"></td>
            <td><input type="text" placeholder="Español" name="esp"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Añadir al diccionario"></td>
        </tr>
    </table>
    </form>
    
    <form action="#" method="post">
        <input type="hidden" name="quest" value="<?php echo htmlspecialchars(serialize($quest))?>">
        <table>
    <?php
        foreach ($quest as $eng) {
            ?>
            <tr>
                <td><?=$eng?></td>
                <td><input type="text" placeholder=Español name="ans[]"></td>
            </tr>
            <?php
        }
    ?>
            <tr>
                <td colspan="2"><input type="submit" value="Enviar Respuesta"></td>
            </tr>
        </table>
    </form>
    <div class="res">
    <?php
        if (isset($acierto)) {
            if ($acierto) {
                echo "Respuesta correcta";
            } else {
                echo "Respuesta incorrecta";
            }
        }
    ?>
    </div>
    </div>
</body>
</html>