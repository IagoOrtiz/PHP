<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<style>
    table {
        height: 512px;
        width: 512px;
        border-collapse: collapse;
        background:url(Images/amogus.jpg);
    }
    tbody, tr, td {
        padding: 0px;
        line-height: 0px;
    }  
</style>
<body>
    <h1>Descubre la imagen oculta</h1>
    <a>Puedes desbloquear hasta 7 cubos. Una vez intentes desbloquear el octavo se te descalificará.</a><br><br>
    <table>
        <tbody>
            <?php           
            $cont = 0;
            if (isset($_REQUEST['arrenv'])) {
                $num = $_REQUEST['numenv'];
                $arr = explode(",",$_REQUEST['arrenv']);
                if (in_array($num, $arr)) {
                    unset($arr[array_search($num, $arr)]);
                } else if (count($arr)<=10) {
                    $arr[] = $num;
                } else {
                    header("location: Ej3Fallo.php");
                }
            } else {
                $arr = array();
            }
            for ($i = 0; $i < 10; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 10; $j++) {
                    $cont++;
                    if (in_array($cont, $arr)) {
                        echo '<td><a><img src="Images/oculto.jpg" height="52px" width="52px" style="opacity: 0"';
                    } else {
                        echo '<td><a href="Ej3.php?arrenv=' . implode(",",$arr) . '&numenv=' . $cont . '"><img src="Images/oculto.jpg" height="52px" width="52px"';
                    }
                    echo '></a></td>';
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <br>
    <form action="Ej3Resultado.php" method="POST">
        <input type="text" name="res"> <input type="submit" value="Comprobar">
    </form>
</body>
</html>