<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <h1>La Primitiva</h1>
    <form action="Ej2Resultados.php" method="POST">
    <table border="solid">
        <tbody>

            <?php
            for ($i = 0; $i <= 4; $i++) {
                echo '<tr>';
                for ($j = 0; $j <= 9; $j++) {
                    $num = ($i * 10) + $j;
                    echo '<td><input type="checkbox" name="' . $num . '" value="' . $num . '">' . $num . '</td>';
                }
                echo '</tr>';
            }
            ?>
            <tr><td colspan="2"> NºSerie</td><td colspan="8"><input type="text" name="Serie" required></td></tr>

        </tbody>

    </table>
    <br>
    <input type="submit" value="Comprobar">
    </form>
</body>
</html>