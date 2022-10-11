<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <table>
        <tbody>
            <?php           
            $cont = 0;
            if (isset($_REQUEST['arrenv'])) {
                $num = $_REQUEST['numenv'];
                $arr = explode(",",$_REQUEST['arrenv']);
                if (in_array($num, $arr)) {
                    unset($arr[array_search($num, $arr)]);
                } else {
                    $arr[] = $num;
                }
            } else {
                $arr = array();
            }
            for ($i = 0; $i < 10; $i++) {
                echo '<tr>';
                for ($j = 0; $j < 10; $j++) {
                    $cont++;
                    echo '<td><a href="Ej1.php?arrenv=' . implode(",",$arr) . '&numenv=' . $cont . '"><img src=';
                    if (in_array($cont, $arr)) {
                        echo '"Images/dancedog.gif"';
                    } else {
                        echo '"Images/dog.jfif"';
                    }
                    echo ' height="70px" width="70px"></a></td>';
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>