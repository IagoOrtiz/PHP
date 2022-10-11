<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
</head>
<style>
    body {
        text-align: center;
    }
</style>

<body>
    <h1>Servidor de citas Laribidon</h1>
    ________________________________________________________________________________________________________<br>
    <?php
    $arr = unserialize($_REQUEST['arr']);
    if (isset($_REQUEST['type']) && count($arr) > 1) {
        if ($_REQUEST['type'] == "Heterosexual") {
            do {
                $p1 = random_int(0,count($arr)-1);
            } while ($arr[$p1][2] != "Heterosexual");
            do {
                $p2 = random_int(0,count($arr)-1);
            } while ($arr[$p2][2] == "Homosexual" || $arr[$p2][1] == $arr[$p1][1]);
        } else if ($_REQUEST['type'] == "Homosexual") {
            do {
                $p1 = random_int(0,count($arr)-1);
            } while ($arr[$p1][2] != "Homosexual");
            do {
                $p2 = random_int(0,count($arr)-1);
            } while (($arr[$p2][2] == "Heterosexual" || $arr[$p2][1] != $arr[$p1][1]) && $p1 != $p2);
        } else {
            do {
                $p1 = random_int(0,count($arr)-1);
            } while ($arr[$p1][2] != "Bisexual");
            do {
                $p2 = random_int(0,count($arr)-1);
            } while (($arr[$p2][2] == "Heterosexual" && $arr[$p2][1] == $arr[$p1][1])||($arr[$p2][2] == "Homosexual" && $arr[$p2][1] != $arr[$p1][1])&&($p1 != $p2));
        }
        echo "<h2>La pareja afortunada es: </h2><br>".$arr[$p1][0]." y ".$arr[$p2][0].".<br>";
    }
    ?>
    <h2>Seleccione el tipo de pareja a generar</h2>
    <form action="Ej4Citas.php" method="post">
        <input type="hidden" name="arr" value='<?php echo serialize($arr); ?>'>
        <select name="type">
            <option value="Heterosexual">Heterosexual</option>
            <option value="Homosexual">Homosexual</option>
            <option value="Bisexual">Bisexual</option>
        </select>
        <input type="submit" value="Generar">
    </form>
</body>

</html>