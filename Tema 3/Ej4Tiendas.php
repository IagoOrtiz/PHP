<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4 Calculadora</title>
</head>

<body>
    <?php
    $med = ($_REQUEST['T1'] + $_REQUEST['T2'] + $_REQUEST['T3'])/3;
    ?>
    <table border="solid">
        <tbody>
            <tr>
                <td></td>
                <td>Precio (€)</td>
                <td>Diferencia</td>
            </tr>
            <tr>
                <td>Tienda 1</td>
                <td><?php echo $_REQUEST['T1']?></td>
                <td><?php echo $_REQUEST['T1']-$med?></td>
            </tr>
            <tr>
                <td>Tienda 2</td>
                <td><?php echo $_REQUEST['T2']?></td>
                <td><?php echo $_REQUEST['T2']-$med?></td>
            </tr>
            <tr>
                <td>Tienda 3</td>
                <td><?php echo $_REQUEST['T3']?></td>
                <td><?php echo $_REQUEST['T3']-$med?></td>
            </tr>
            <tr>
                <td>Media</td>
                <td><?php
                echo $med;
                ?></td>
                <td>0</td>
            </tr>
        </tbody>
    </table>
</body>

</html>