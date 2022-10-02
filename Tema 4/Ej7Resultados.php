<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Resultados</h1>
    <?php
    $acierto = 0;
    $P1 = random_int(1, 49);
    $P2 = random_int(1, 49);
    $P3 = random_int(1, 49);
    $P4 = random_int(1, 49);
    $P5 = random_int(1, 49);
    $P6 = random_int(1, 49);
    $PS = random_int(1, 999);
    ?>
    <table border="solid" style="font-size: 30px; text-align:center;">
        <tbody>
            <?php
            $cont = 0;
            $num = 0;
            for ($i = 0; $i <= 4; $i++) {
                echo '<tr>';
                for ($j = 0; $j <= 9; $j++) {
                    echo '<td';
                    if (isset($_REQUEST[$num])) {
                        $cont++;
                        if (($num == $P1 ||$num == $P2 || $num == $P3 ||
                        $num == $P4 ||$num == $P5 ||$num == $P6)) {
                            echo ' style="color: green; font-weight: bold";';                            
                        } else {
                            echo ' style="font-weight: bold";';
                        }
                    } else if ($num == $P1 ||$num == $P2 || $num == $P3 ||
                    $num == $P4 ||$num == $P5 ||$num == $P6) {
                        echo ' style="color: red; font-weight: bold";';
                    } else {
                        echo ' style="color: gray";';
                    }
                    echo '>' . $num . '</td>';
                    $num++;
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <?php
        if (isset($_REQUEST[$PS])) {
            echo 'Número de serie correcto';
        } else {
            echo 'Número de serie incorrecto';
        }
        if ($cont > 6) {
            echo '<br>Este premio no es válido, ha seleccionado más de 6 números';
        }
    ?>
</body>

</html>