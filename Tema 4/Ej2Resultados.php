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
        $P1 = random_int(1,49);
        $P2 = random_int(1,49);
        $P3 = random_int(1,49);
        $P4 = random_int(1,49);
        $P5 = random_int(1,49);
        $P6 = random_int(1,49);
        $PS = random_int(1,999);
    ?>
    <table border="solid">
        <tbody>
            <tr>
                <td><?php echo $P1 ?></td>
                <td><?php echo $P2 ?></td>
                <td><?php echo $P3 ?></td>
                <td><?php echo $P4 ?></td>
                <td><?php echo $P5 ?></td>
                <td><?php echo $P6 ?></td>
                <td><?php echo $PS ?></td>
            </tr>
        </tbody>
    </table>
    <a>Coincidencias: 
    <?php
        if (isset($_REQUEST[$P1])) {
            echo $P1.', ';
            $acierto++;
        }
        if (isset($_REQUEST[$P2])) {
            echo $P2.', ';
            $acierto++;
        }
        if (isset($_REQUEST[$P3])) {
            echo $P3.', ';
            $acierto++;
        }
        if (isset($_REQUEST[$P4])) {
            echo $P4.', ';
            $acierto++;
        }
        if (isset($_REQUEST[$P5])) {
            echo $P5.', ';
            $acierto++;
        }
        if (isset($_REQUEST[$P6])) {
            echo $P6.', ';
            $acierto++;
        }
        if (isset($_REQUEST[$PS])) {
            echo $PS;
            $acierto++;
        }
        echo '<br>Aciertos: '.$acierto;
    ?>
    </a>
</body>
</html>