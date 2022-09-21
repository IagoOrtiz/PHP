<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2 Primitiva</title>
</head>

<body>
    <?php 
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
                <td></td>
                <td>Nº1</td>
                <td>Nº2</td>
                <td>Nº3</td>
                <td>Nº4</td>
                <td>Nº5</td>
                <td>Nº6</td>
                <td>Nº Serie</td>
            </tr>
            <tr>
                <td>Tu Número</td>
                <td><?php echo $_GET['N1']?></td>
                <td><?php echo $_GET['N2']?></td>
                <td><?php echo $_GET['N3']?></td>
                <td><?php echo $_GET['N4']?></td>
                <td><?php echo $_GET['N5']?></td>
                <td><?php echo $_GET['N6']?></td>
                <td><?php echo $_GET['NS']?></td>
            </tr>
            <tr>
                <td>Ganador</td>
                <td><?php echo $P1?></td>
                <td><?php echo $P2?></td>
                <td><?php echo $P3?></td>
                <td><?php echo $P4?></td>
                <td><?php echo $P5?></td>
                <td><?php echo $P6?></td>
                <td><?php echo $PS?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>