<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<body>
    <?php
        if (isset($_REQUEST['arr'])) {
            $arr = unserialize($_REQUEST['arr']);
            $temp = array($_REQUEST['type']);
            for ($i=1; $i <= 4; $i++) { 
                if (isset($_REQUEST[$i])) {
                    $temp[] = $_REQUEST[$i];
                }
            }
            $arr[] = $temp;
        } else {
            $arr = array();
        }
    ?>
    <h1>Pizzeria Sans Undertale</h1>
    Realize su pedido por la web.<br>
    ________________________________________________________________________________________________________<br>
    <h2>Pizza</h2>
    <form action="Ej2.php" method="POST">
        <input type="hidden" name="type" value="Pizza">
        <input type="checkbox" name="1" value="jamón">Jamón
        <input type="checkbox" name="2" value="atun">Atun
        <input type="checkbox" name="3" value="bacon">Bacon
        <input type="checkbox" name="4" value="pepperoni">Pepperoni  &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
        <input type="submit" value="Añadir">
    </form>
    ________________________________________________________________________________________________________<br>
    <h2>Hamburguesa</h2>
    <form action="Ej2.php" method="POST">
        <input type="hidden" name="type" value="Hamburguesa">
        <input type="checkbox" name="1" value="lechuga">Lechuga
        <input type="checkbox" name="2" value="tomate">Tomate
        <input type="checkbox" name="3" value="queso">Queso &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
        <input type="submit" value="Añadir">
    </form>
    ________________________________________________________________________________________________________<br>
    <h2>Perrito Caliente</h2>
    <form action="Ej2.php" method="POST">
        <input type="hidden" name="type" value="Perrito">
        <input type="checkbox" name="1" value="lechuga">Lechuga
        <input type="checkbox" name="2" value="cebolla">Cebolla
        <input type="checkbox" name="3" value="patata">Patata  &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
        <input type="submit" value="Añadir">
    </form>
    ________________________________________________________________________________________________________<br>
</body>
<br>
<form action="Ej2Envio.php" method="POST">
    <input type="hidden" name="arr" value='<?php echo serialize($arr);?>'>
    <input type="submit" value="Enviar pedido">
</form>
<br>
<form action="Ej2.php">
    <input type="submit" value="Reiniciar pedido">
</form>

</html>