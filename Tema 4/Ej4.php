<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <table border="solid">
        <tbody>
            <tr>
                <td>Bloque</td>
                <td>Piso</td>
                <td>Timbre</td>
            </tr>
            <?php
                for ($i=1; $i <= 10; $i++) { 
                    for ($j=1; $j <= 7; $j++) { 
                        echo '<tr>
                        <td>'.$i.'</td>
                        <td>'.$j.'</td>
                        <td> <form action="Ej4Llamada.php" method="post">
                        <input type="hidden" name="block" value="'.$i.'">
                        <input type="hidden" name="stage" value="'.$j.'">
                        <input type="submit" value="Llamar">
                        </form>
                        </tr>';
                    }
                }
            ?>
        </tbody>
    </table>
</body>
</html>