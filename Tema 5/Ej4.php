<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<style>
    body {
        text-align: center;
    }
</style>
<body>
    <?php
        if (isset($_REQUEST['arr'])) {
            $arr = unserialize($_REQUEST['arr']);
            $temp = array($_REQUEST['nombre'], $_REQUEST['sexo'], $_REQUEST['orientacion']);
            $arr[] = $temp;
        } else {
            $arr = array();
        }
    ?>
    <h1>Servidor de citas Laribidon</h1>
    ________________________________________________________________________________________________________<br>
    <h2>Introduzca personas</h2>
    <form action="Ej4.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre">&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="sexo">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="orientacion">
            <option value="Heterosexual">Heterosexual</option>
            <option value="Homosexual">Homosexual</option>
            <option value="Bisexual">Bisexual</option>
        </select>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
        <input type="submit" value="Añadir">
    </form><br>
    <form action="Ej4Citas.php" method="POST">
        <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
        <input type="submit" value="Comenzar">
    </form><br>
    <form action="Ej4.php">
        <input type="submit" value="Reiniciar lista">
    </form>
</body>
</html>